const path = require('path');
const express = require('express');
const http = require('http');
const SocketIo = require('socket.io');

const app = express();
const server = http.createServer(app);
const io = SocketIo.listen(server);

// settings

// routes
app.get('/', (req, res) => {
  res.sendFile(__dirname +'/index.html');
});

// static files
app.use(express.static(path.join(__dirname, 'public')));

const SerialPort = require('serialport');
const Readline = SerialPort.parsers.Readline;
const parser = new Readline();

const mySerial = new SerialPort('COM3', {
  baudRate: 9600
});

mySerial.pipe(parser);

mySerial.on('open', function () {
  console.log('Opened Port.');
});

parser.on('data', function (data) {
  console.log(parseInt(data));
  var data_str = data.toString();
  var data_array = data_str.split(","); 
  console.log(data.toString());
  
  io.emit('arduino:data', {
    value: data_array[0]
  });
  io.emit('arduino:data1', {
    value: data_array[1]
  });
});

mySerial.on('err', function (data) {
  console.log(err.message);
});

server.listen(3000, () => {
  console.log('Server on port 3000');
});