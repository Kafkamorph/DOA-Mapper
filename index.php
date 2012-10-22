<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>

<style type='text/css' >
</style>


    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>
      DOA
    </title>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1.1', {packages: ['controls']});
    </script>
    <script type="text/javascript">
      function drawVisualization() {
<?php
mysql_connect("localhost","user","password");
mysql_select_db("doa");
mysql_query("SET NAMES 'UTF_8'");

?>

var datax = google.visualization.arrayToDataTable([
        ['x', 'y','Alliance',	'name', 'might','type','lastGMT'],
<?php
$allx=0;
$a=mysql_query("select distinct x,y,alliance,name,might,type,upt as lastGMT from cantil  order by might desc limit 5000	") or die(mysql_error());
$total=mysql_num_rows($a);
while($r=mysql_fetch_row($a))
{
$allx++;
$r[3]=trim($r[3]);
if(substr($r[5],0,4)== "City") $r[5]="<b>$r[5]<b>";

echo "[$r[0],$r[1],'$r[2]','$r[3]',$r[4],'$r[5]','$r[6]'  ]";
if($allx<$total) echo ",\n\r";
}
?>
]);

var dataxx = google.visualization.arrayToDataTable([
        ['x', 'y','Alliance',	'name', 'might','type','last'],
<?php
#$xa=mysql_query("select x,y,alliance,name,might,type,upt from cantil  order by might desc limit 5000	") or die(mysql_error());
$xa=mysql_query("select distinct x,y,alliance, name,might,type,upt from cantil  group by name order by might	 desc limit 1000	") or die(mysql_error());

$totalx=mysql_num_rows($xa);
while($r=mysql_fetch_row($xa))
{
$allxx++;
$r[3]=trim($r[3]);
#echo "[$r[0],$r[1],'$r[2]','$r[3]',$r[4],'$r[5]','$r[6]']";
#if($allxx<$totalx) echo ",\n\r";
}




?>
//        [0, 0,'','test', 	0,	'0','no']
]);
//draw(datax);
//datax.addColumn({type: 'string', role: 'tooltip'});
//        datax.addRows([
//        [153,201,'Sport2', 	102,'friendly','teste']
//]);


//new

var cities = new google.visualization.ControlWrapper({
    'controlType': 'CategoryFilter',
        'containerId': 'control3',
        'options': {
              'filterColumnLabel': 'might',
                    'ui': {
                    'allowTyping': false,
                    'allowMultiple': true,
                        'selectedValuesLayout': 'belowStacked'
                                      }
                                      }
                                      //,
                                      // Define an initial state, i.e. a set of metrics to be initially selected.
//                  'state': {'selectedValues': ['Cities', 'Outposts']}
                                                                    });
//new end

                

          var stringfilter = new google.visualization.ControlWrapper({
               'controlType': 'StringFilter',
               'containerId': 'strname_div',
               'options': {
               'ui':   {label: 'Search by name', labelSeparator: ':'},
                     'filterColumnLabel': 'name',
               }
          });


      
        var slider = new google.visualization.ControlWrapper({
          'controlType': 'NumberRangeFilter',
          'containerId': 'control1',
          'options': {
            'filterColumnLabel': 'might',
          'ui': {'labelStacking': 'vertical',

          label: 'Might', labelSeparator: ':'         }
          }
           ,'state': {'lowValue': 100000}
        });
      
        var categoryPicker = new google.visualization.ControlWrapper({
          'controlType': 'CategoryFilter',
          'containerId': 'control2',
          'options': {
            'filterColumnLabel': 'Alliance',
            'useFormattedValue': true,
            'ui': {
            'labelStacking': 'vertical',
              'allowTyping': false,
              'allowMultiple': true
            }
          }
        });
      
  
                                   
        var table = new google.visualization.ChartWrapper({
          'chartType': 'Table',
          'containerId': 'chart2',
          'options': {
          'allowHtml': true,

          'sortColumn': 4,
          'pageSize': 5,
          'sortAscending': false,
            'width': '1020px'
          }
        });

        var piex = new google.visualization.ChartWrapper({
          'chartType': 'ScatterChart',
          'containerId': 'control3',
          'options': {


hAxis: {title: 'X', minValue: 0, maxValue: 749, viewWindowMode: 'pretty'},
colors:['green', 'red'],
          vAxis: {title: 'Y', minValue: 0, maxValue: 749, direction: 1},
            'width': 420,
            'height': 450,
            'legend': 'none',
            'chartArea': {'left': 75, 'top': 15, 'right': 0, 'bottom': 0},
//            }
          },
//          'view': {'columns': [0, 3]}
          'view': {'columns': [0,1]}
        });



        var piexx = new google.visualization.ChartWrapper({
          'chartType': 'ScatterChart',
          'containerId': 'control3x',


          'options': {
hAxis: {
viewWindow: {min:0, max:751} ,

title: 'X', minValue: 0, maxValue: 751, viewWindowMode: 'explicit'},
colors:['blue', 'red'],
          vAxis: {viewWindow: {min:0, max:751} ,
          
          title: 'Y', minValue: 0, maxValue: 751, direction: -1},
            'width': 550,
            'height': 550,
            'legend': 'none',
            'chartArea': {'left': 75, 'top': 15, 'right': 0, 'bottom': 0},
//            }
          },
//          'view': {'columns': [0, 3]}
          'view': {'columns': [0, 1]}
        });

        
        
        new google.visualization.Dashboard(document.getElementById('dashboard')).
//            bind([stringfilter, slider, cities, categoryPicker], [piexx,table]).
            bind([stringfilter, slider,categoryPicker], [piexx,table]).
            
            
            
//            bind([slider, categoryPicker], [piexx,,table] ).
//                draw(datax);
                draw(datax, {'colors': ['red', 'black']}); 
//                draw(dataxx, {'colors': ['green', 'black']}); 
//                draw(dataxx);
//    piex.draw(datax, options);
    table.draw();
    
//google.visualization.events.addListener(table, 'select', function() {
//  google.visualization.events.addListener(table, 'select',  selectHandler);
//
//function selectHandler(e) {
////var selection = table.getSelection();
//
//alert('A table row was selected '+e.row);
//                                        
////    });
//}    

}      
      google.setOnLoadCallback(drawVisualization);
    </script>
  </head>
  <body style="font-family: Arial;border: 0 none;" bgcolor="#dddddd">

<?php
$c=mysql_query("select count(x) from cantil");
$cc=mysql_fetch_row($c);
echo "<br><font size='5'> Kabam DOA Mapper V0.5 - Cantil Realm cities + outposts<br></b></font>";
echo "Total in database: $cc[0]";
#echo last
#<form name="myLetters" action="index.php" method="GET">
#<input type="text" name="x" size=3 id="x" value="" /> X
#<input type="text" name="y" size=3 id="y" value="" /> Y
#<input type="submit" name="submit" value="submit" />
#';
?>

    <div id="dashboard">
      <table>
        <tr style='vertical-align: top'>
          <td style='width: 200px; font-size: 0.9em;'>
            <div id="strname_div"></div><br>
            <div id="control1"  ></div><br>
            <div id="control2"  ></div><br>
            <div id="control3"  ></div><br>
                <div id="control3x" ></div>
          </td>
          <td style='width: 200px'>

<font color=#ff0000 size=4>
 NOTES: Proof of concept - mapping of Cantil realm of DOA -  <a href="https://github.com/Kafkamorph/DOA-Mapper">Source here</a>
<br> <br></font>- There could be value discrepancies between a player's ownerships - which means player's power changed while the script was running.
<br> <br>-  Min value for slider is now 100k, if you want to see even weaker players, or a certain value, move the sliders.
<br><br> - After I contacted KABAM support about a vulnerability, they decided not to fix it, and banned 4 of my 120+ forum accounts (big deal) when I asked for a char with 4 stuck marches to be fixed.
The thing is, I tried to offer my help. They don't want it, and were rude in the process. 
<br>So, source is public now. Game over. Go to the source site to read more, get info, and DIY.
<br><br>
 </font>
           <div style="float: left; " id="chart2"></div>
            <div style="float: left; background-color: #0900C4;" id="chart3"></div>
          </td>
        </tr>
      </table>
      
    </div>
  </body>
</html>
