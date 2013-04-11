<?php
$url="http://www.seoclerks.com/api?type=inlinead&s=".$_REQUEST['s']."&aff=".$_REQUEST['aff']."&by=".$_REQUEST['by']."&c=".$_REQUEST['c']."&ul=".$_REQUEST['ul']."&am=1&g=".$_REQUEST['g']."&sub=".$_REQUEST['sub']."&os=".$_REQUEST['os']."&sp=".$_REQUEST['sp']."&oby=&oh=&f=singlehtml";
echo get_data($url); 

/* gets the data from a URL */
 
function get_data($url)
{
$ch = curl_init();
$timeout = 5;
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
$data = curl_exec($ch);
curl_close($ch);
return $data;
}
?>