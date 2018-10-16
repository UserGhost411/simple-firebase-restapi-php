<?php 
$auth_firebase = "your-auth-key-firebase";
$database_firebase ="https://your-database.firebaseio.com";
$apikey_firebase= "your-api-key-firebase";
include("FirebaseCore.php");
//echo loginfirebase("email@email.com","password");
/*
//Firebase Delete Database Example
echo delfirebase("rooms/cbt/-LOuqannC6RN9q2vtThR");
*/

/*
//Firebase Push Database Example
echo pushfirebase("rooms/cbt",'{"hello": "6"}');
*/

/*
//Firebase Update Database Example
echo updatefirebase("rooms/cbt/-LOuqannC6RN9q2vtThR",'{"hello": "ss"}');
*/
/*
//Firebase Get Database Example
$users = json_decode( getfirebase("rooms/bot") , true);
$data = array_keys($users);
$x =0;
while($x <= count($data)-1) {
	$keyx = $data[$x];
    echo $users[$keyx]['sender'].":".$users[$keyx]['message']."<br>";
    $x++;
} 
*/
?>
