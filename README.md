# simple-firebase-restapi-php
Simple Firebase Rest API PHP

# Example Usage
- Auth
```
$auth_firebase = "your-auth-key-firebase";
$database_firebase ="https://your-database.firebaseio.com";
$apikey_firebase= "your-api-key-firebase";
include("FirebaseCore.php");
```
- Push
```
//pushfirebase(<your-sub-database>,<data-based-json>)
pushfirebase("rooms/cbt",'{"hello": "6"}');
```
- Update
```
//updatefirebase(<your-sub-database>,<data-based-json>)
updatefirebase("rooms/cbt/-LOuqannC6RN9q2vtThR",'{"hello": "hmmm"}');
```
- Get
```
//getfirebase(<your-sub-database>)
$users = json_decode( getfirebase("rooms/bot") , true);
$data = array_keys($users);
$x =0;
while($x <= count($data)-1) {
	$keyx = $data[$x];
    echo $users[$keyx]['sender'].":".$users[$keyx]['message']."<br>";
    $x++;
} 
```
- Delete
```
//delfirebase(<your-sub-database>)
delfirebase("rooms/cbt/-LOuqannC6RN9q2vtThR");
```
# License

php-simple-thumb is licensed under the [MIT license](LICENSE), see [LICENSE.md](LICENSE) for details.
