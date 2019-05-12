<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>C5 Dashboard</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <img class="img-responsive" src="https://biz.prlog.org/Tec-de-Monterrey/logo.jpg">
        </div>
      </div>
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-4">
          <canvas id="chart0"></canvas>
        </div>
        <div class="col-md-4">
          <canvas id="chart1"></canvas>
        </div>
        <div class="col-md-2"></div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <canvas id="chart2"></canvas>
        </div>
        <div class="col-md-6">
          <canvas id="chart3"></canvas>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <canvas id="chart4"></canvas>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="/socket.io/socket.io.js" charset="utf-8"></script>
    <script type="text/javascript">
      const socket = io();
      var ctx0 = document.getElementById('chart0').getContext('2d');
      var ctx1 = document.getElementById('chart1').getContext('2d');
      var ctx2 = document.getElementById('chart2').getContext('2d');
      var ctx3 = document.getElementById('chart3').getContext('2d');
      var ctx4 = document.getElementById('chart4').getContext('2d');
      
      var chart0 = new Chart(ctx0, {
          // The type of chart we want to create
          type: 'line',
          // The data for our dataset
          data: {
              labels: ["Values"],
              datasets: [{
                  label: "Serial from A0",
                  backgroundColor: 'rgb(52, 73, 94)',
                  borderColor: 'rgb(41, 128, 185)',
                  data: [],
              }]
          },
          // Configuration options go here
          options: {}
      });
      let counter0 = 0 ;
      socket.on('arduino:data0', function (dataSerial0) {
        // console.log(dataSerial);
        chart0.data.labels.push(counter0);
        chart0.data.datasets.forEach(dataset => {
          dataset.data.push(dataSerial0.value);
        });
        counter0++;
        chart0.update();
      });

      var chart1 = new Chart(ctx1, {
          // The type of chart we want to create
          type: 'line',
          // The data for our dataset
          data: {
              labels: ["Values"],
              datasets: [{
                  label: "Serial from A1",
                  backgroundColor: 'rgb(236, 50, 50)',
                  borderColor: 'rgb(222, 50, 50)',
                  data: [],
              }]
          },
          // Configuration options go here
          options: {}
      });
      let counter1 = 0 ;
      socket.on('arduino:data1', function (dataSerial1) {
        // console.log(dataSerial);
        chart1.data.labels.push(counter1);
        chart1.data.datasets.forEach(dataset => {
          dataset.data.push(dataSerial1.value);
        });
        counter1++;
        chart1.update();
      });

      var chart2 = new Chart(ctx2, {
          // The type of chart we want to create
          type: 'line',
          // The data for our dataset
          data: {
              labels: ["Values"],
              datasets: [{
                  label: "Serial from A2",
                  backgroundColor: 'rgb(192, 23, 158)',
                  borderColor: 'rgb(172, 23, 158)',
                  data: [],
              }]
          },
          // Configuration options go here
          options: {}
      });
      let counter2 = 0 ;
      socket.on('arduino:data2', function (dataSerial2) {
        // console.log(dataSerial);
        chart2.data.labels.push(counter2);
        chart2.data.datasets.forEach(dataset => {
          dataset.data.push(dataSerial2.value);
        });
        counter2++;
        chart2.update();
      });

      var chart3 = new Chart(ctx3, {
          // The type of chart we want to create
          type: 'line',
          // The data for our dataset
          data: {
              labels: ["Values"],
              datasets: [{
                  label: "Serial from A3",
                  backgroundColor: 'rgb(23, 153, 192)',
                  borderColor: 'rgb(3, 153, 192)',
                  data: [],
              }]
          },
          // Configuration options go here
          options: {}
      });
      let counter3 = 0 ;
      socket.on('arduino:data3', function (dataSerial3) {
        // console.log(dataSerial);
        chart3.data.labels.push(counter3);
        chart3.data.datasets.forEach(dataset => {
          dataset.data.push(dataSerial3.value);
        });
        counter3++;
        chart3.update();
      });

      var chart4 = new Chart(ctx4, {
          // The type of chart we want to create
          type: 'line',
          // The data for our dataset
          data: {
              labels: ["Values"],
              datasets: [{
                  label: "Serial from A4",
                  backgroundColor: 'rgb(23, 192, 35)',
                  borderColor: 'rgb(3, 153, 192)',
                  data: [],
              }]
          },
          // Configuration options go here
          options: {}
      });
      let counter4 = 0 ;
      socket.on('arduino:data4', function (dataSerial4) {
        // console.log(dataSerial);
        chart4.data.labels.push(counter4);
        chart4.data.datasets.forEach(dataset => {
          dataset.data.push(dataSerial4.value);
        });
        counter4++;
        chart4.update();
      });
    </script>
  </body>
</html>
