<?php
/*
database call name 'getrestapi' and have a table as `user`
id - int(10) AI PK
name - varchar (20)
age - int(2)
*/

require_once __DIR__ . '/config.php';

class API 
{
	function Select(){
		$db = new Connect;
		$users = array();
		$data = $db->prepare('SELECT * FROM user ORDER BY id');
		$data->execute();
		while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
			$users[$OutputData['id']] = array(
				'id' 	=> $OutputData['id'],
				'name' 	=> $OutputData['name'],
				'age' 	=> $OutputData['age']
			);
		}
		return json_encode($users);
	}
}

$API = new API;
header('Content-Type: application/json');
echo $API->Select();

?>