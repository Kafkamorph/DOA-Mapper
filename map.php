<?php
date_default_timezone_set("Europe/London");
$ddd=date("Y-m-d H:i:s");
echo "start: $ddd\n\r";
$date1 = time();

mysql_connect("localhost","user","password");
mysql_select_db("doa");
mysql_query("SET NAMES 'UTF_8'");
$all=0;

$a=time();
#echo "a $a ";

$ch = curl_init();
$url="http://realm313.c14.castle.wonderhill.com/api/map.json";
$url2="http://realm313.c14.castle.wonderhill.com";
curl_setopt($ch, CURLOPT_URL, "$url");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_NOPROGRESS, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);




for($x=414;$x<750;$x=$x+6)
{
@$allx++;

#$y++;
#while($x<20)
for($y=0;$y<750;$y=$y+16)
{
$allx++;
#$x++;
$d2=date("Y-m-d H:i:s");
echo "$d2 $allx doing x $x y $y \n\r";


$enc="map%5Fsize=8&%5Fsession%5Fid=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx&timestamp=$a&version=saturnv&y=$y&user%5Fid=xxxxxxxx&dragon%5Fheart=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx&x=$x&height=16&width=6";
$lol1 =  "Draoumculiasis" . $enc . "LandCrocodile" . $url  . "Bevar-Asp" ;
#echo "lol1 $lol1\n\r";
$lol=sha1($lol1);
#echo "lol: $lol \n\r";


$headers = $headers = array("x-s3-aws: ".$lol);
curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );
curl_setopt($ch, CURLOPT_ENCODING , "");   
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:14.0) Gecko/20100101 Firefox/14.0.1");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$enc);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
$data6 = curl_exec($ch);
#email end
#echo "enc $enc \n\r";
#echo "got ".$data6."\n\r";
$dec=json_decode($data6,true);
#print_r($dec);
#die;

usleep(2000000);
if($data6=="429 API Rate Limit Exceeded. Your session is currently blocked.")
{
echo " $data6 ";
echo "fuck, waiting\n\r";
die;
}
foreach ($dec['map_cities'] as $v=>$vv) 
{
$tt=$vv['type'];
$xx=$vv['x'];
 $yy=$vv['y'];
 $all=$vv['alliance_name'];
 $might=$vv['might'];
 $levelp=$vv['level'];
 $nameo=$vv['name'];
 $iddd=$vv['map_player_id'];
 $idd=$vv['id'];
 $heal=$vv['healing'];


if($might<100 or $levelp<2) continue;


#nomes
$as=mysql_query("select id,name from cantilnomes where id=$iddd") or die(mysql_error());
$ass=mysql_fetch_row($as);
if($ass[1]) $name=$ass[1];

if(!$ass[1])
#find the mofo name
{
echo "\n\r finding name for id $iddd \n\r";
usleep(2000000);
$ch2 = curl_init();
$url2="http://realm313.c14.castle.wonderhill.com/api/map/tile_at.json";
curl_setopt($ch2, CURLOPT_URL, "$url2");
curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch2, CURLOPT_NOPROGRESS, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);

$enc="dragon%5Fheart=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx&%5Fsession%5Fid=xxxxxxxxxxxxxxxxxxxxxxxxxxxxx&user%5Fid=xxxxxxxx";

$lol1 =  "Draoumculiasis" . $enc . "LandCrocodile" . $url2  . "Bevar-Asp" ;
#echo "lol1 $lol1\n\r";
$lol=sha1($lol1);
$headers = $headers = array("x-s3-aws: ".$lol);

curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers );
curl_setopt($ch2, CURLOPT_ENCODING , "");   
curl_setopt($ch2, CURLOPT_VERBOSE, 0);
curl_setopt($ch2, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:14.0) Gecko/20100101 Firefox/14.0.1");
curl_setopt($ch2, CURLOPT_POST, 1);
curl_setopt($ch2, CURLOPT_POSTFIELDS,$enc);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
$data6 = curl_exec($ch2);
#email end
echo "got ".$data6."\n\r";
if($data6=="429 API Rate Limit Exceeded. Your session is currently blocked.")
{
echo " $data6 ";
echo "fuck, waiting\n\r";
die;
}
$dec2=json_decode($data6,true);
$name=$dec2['map_player']['name'];
$idname=$dec2['map_player']['id'];
$ast=(" insert ignore into cantilnomes values ('$idname','$name') ");
echo $ast; 
usleep(1000000);
mysql_query($ast) or die(mysql_error());
#print_r($dec2);
#die;
}
#nomes end


$a="replace into `cantil` values ($xx,$yy,'$all',$might,$levelp,'$heal','$name', '','$tt $nameo',$iddd,now(),'$name')" or die(mysql_error());
echo "$a\n\r";
#fwrite($fpp,"$a\n\r");
#die;
 mysql_query($a) or die(mysql_error());


#}
#echo $a;

#print_r($dec);
#die;
#}


}

}
#x
}
#y

$ddd=date("Y-m-d H:i:s");
echo "end: $ddd\n\r";
$date2 = time();
$mins = ($date2 - $date1) / 60;
echo "min: $mins";


?>


