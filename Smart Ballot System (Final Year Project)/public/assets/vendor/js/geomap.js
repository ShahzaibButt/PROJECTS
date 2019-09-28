
//Over All Country
google.charts.load('current', {
        'packages':['geochart'],
        // Note: you will need to get a mapsApiKey for your project.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
        'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['Country', 'Population in Millions', 'Total Voters in Millions'],
          ['Pakistan', 204.73, 106],
        
        ]);

        var options = {
          region: 'PK',
          datalessRegionColor: '#66665b'
        };
       

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }

//Provinces

google.load('visualization', '1', {'packages': ['geochart']});
google.setOnLoadCallback(drawVisualization);

  function drawVisualization() {var data = new google.visualization.DataTable();

 data.addColumn('string', 'Country');
 data.addColumn('number', 'Total Votes'); 
 data.addColumn({type:'string', role:'tooltip'});var ivalue = new Array();


 data.addRows([[{v:'PK-SD',f:'Sindh'},1,'22.39 million: 12.44m are male and 9.95m are female voters']]);


 data.addRows([[{v:'PK-PB',f:'Punjab'},26,'60.67 million: 33.68m are male and 26.99m are female voters']]);


data.addRows([[{v:'PK-GB',f:'Gilgit Baltistan'},100,'']]);


 data.addRows([[{v:'PK-TA',f:'Fata'},36,'2.5 million: 1.5m male and 1m female voters']]);


  data.addRows([[{v:'PK-JK',f:'Islamabad'},50,'0.76 million: 407,463 male and 357,885 female voters']]);


  data.addRows([[{v:'PK-KP',f:'Khyber Pakhtunkhwa'},70,'15.32 million: 8.71m male and 6.61m female voters']]);


  data.addRows([[{v:'PK-BA',f:'Balochistan'},40,'4.3 million: 2.49m male and 1.81m female voters']]);

 
 

 var options = {
 backgroundColor: {fill:'#FFFFFF',stroke:'#FFFFFF' ,strokeWidth:0 },
 colorAxis:  {minValue: 1, maxValue: 100,  colors: ['#438094','green','yellow','red','#4c4394']},
 backgroundColor: {fill:'#FFFFFF',stroke:'#FFFFFF' ,strokeWidth:0 },    
 datalessRegionColor: '#66665b',
 displayMode: 'regions', 
 enableRegionInteractivity: 'true', 
 resolution: 'provinces',
 sizeAxis: {minValue: 1, maxValue:1,minSize:10,  maxSize: 10},
 region:'PK',
 keepAspectRatio: true,

 tooltip: {textStyle: {color: '#444444'}, trigger:'hover'}  
 };
   var chart = new google.visualization.GeoChart(document.getElementById('visualization')); 



 chart.draw(data, options);
 }