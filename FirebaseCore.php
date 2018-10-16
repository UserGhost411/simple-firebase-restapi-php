<?php
//
// Simple Firebase Rest Api PHP by UserGhost411
//
$err=0;
if(empty($auth_firebase)){
echo "<b>Please Set Variable</b> ".'$auth_firebase before include("FirebaseCore.php") , find auth key here <code>https://console.firebase.google.com/project/&lt;YOUR-DATABASE&gt;/settings/serviceaccounts/databasesecrets</code><br>';
$err=1;
}
if(empty($database_firebase)){
echo "<b>Please Set Variable</b> ".'$databse_firebase before include("FirebaseCore.php") , <code>https://&lt;YOUR-DATABASE&gt;.firebaseio.com</code><br>';
$err=1;
}
if(empty($apikey_firebase)){
echo "<b>Please Set Variable</b> ".'$databse_firebase before include("FirebaseCore.php") ,find auth key here <code>https://console.firebase.google.com/project/&lt;YOUR-DATABASE&gt;/settings/general/</code><br>';
$err=1;
}
if($err==1){
die("<br><b>Error Detected</b> : Stoping Proccess FirebaseCore.php");
}
$GLOBALS['auth_firebase']=$auth_firebase;
$GLOBALS['database_firebase']=$database_firebase;
$GLOBALS['apikey_firebase']=$apikey_firebase;
function loginfirebase($email,$password){
    $url = "https://www.googleapis.com/identitytoolkit/v3/relyingparty/verifyPassword?key=".$GLOBALS['apikey_firebase'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);                               
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, 
	'{
	"email": "'.$email.'",
	"password": "'.$password.'",
	"returnSecureToken": "true"
	}');
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $jsonResponse = curl_exec($ch);
    if(curl_errno($ch)){return 'Curl error: ' . curl_error($ch);}
    curl_close($ch);
	$idtoken = json_decode($jsonResponse,true)['idToken'];
return $jsonResponse;
if(!empty($idtoken)){
return "OK";
}else{
return $jsonResponse;
}
}
function pushfirebase($subdatabase,$data){
    $url = $GLOBALS['database_firebase']."/".$subdatabase.".json?auth=".$GLOBALS['auth_firebase'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);                               
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));
    $jsonResponse = curl_exec($ch);
    if(curl_errno($ch)){return 'Curl error: ' . curl_error($ch);}
    curl_close($ch);
return $jsonResponse;
}
function delfirebase($subdatabase){
    $url = $GLOBALS['database_firebase']."/".$subdatabase.".json?auth=".$GLOBALS['auth_firebase'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);                               
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));
    $jsonResponse = curl_exec($ch);
    if(curl_errno($ch)){return 'Curl error: ' . curl_error($ch)."[".$url."]";}
    curl_close($ch);
return $jsonResponse;
}
function getfirebase($subdatabase){
    $url = $GLOBALS['database_firebase']."/".$subdatabase.".json?auth=".$GLOBALS['auth_firebase'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);                               
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPGET, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));
    $jsonResponse = curl_exec($ch);
    if(curl_errno($ch)){return 'Curl error: ' . curl_error($ch)."[".$url."]";}
    curl_close($ch);
return $jsonResponse;
}
function updatefirebase($subdatabase,$data){
$url = $GLOBALS['database_firebase']."/".$subdatabase.".json?auth=".$GLOBALS['auth_firebase'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);                               
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));
    $jsonResponse = curl_exec($ch);
    if(curl_errno($ch)){return 'Curl error: ' . curl_error($ch)."[".$url."]";}
    curl_close($ch);
return $jsonResponse;
}
?>