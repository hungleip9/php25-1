<?php
// include_once 'connect.php';
include_once 'connection.php';



function select($table){
	$query = " SELECT * FROM ".$table;

	$connection  = new connection();
	$conn = $connection->connect();


	$result = $conn->query($query);

	$data = array();

	while($row = $result->fetch_assoc()) { 
		$data[] = $row;
	}
    
	return $data;
}



function detail($table,$id){
	 $query = "SELECT * from ".$table." WHERE ".$table."_id = " . $id;
	

	/*$connection  = new connection();
	$conn = $connection->connect();

	$status = $conn->query($query);
*/
	return $query;
}



// insert table để duyệt được 
function insert($table,$data){
	$query = "INSERT INTO $table ";
	$string1 = '';
	$string2 = '';
	$i = 0;
	foreach ($data as $column => $value) {
		$i++;
		$string1 .= $column;
		if ($i != count($data) ) {
			$string1 .= ',';
		}
		$string2 .= "'".$value."'";
		if ($i != count($data)) {
			$string2 .= ",";
		}
	}
	$string = '('.$string1.')'.' VALUES '.'('.$string2.')';
	
	$query = $query . $string;
	
	$connection  = new connection();
	$conn = $connection->connect();

	$status = $conn->query($query);
	return $status;
}
function edit($table,$data,$id){
	
	$query = "UPDATE $table SET ";
	$string = '';
	$stringtail = " WHERE ". $table."_id = $id;";

	$i = 0;
	foreach ($data as $column => $value) {
		$i++;
		if($i==1){
			continue;
		}
		$query = $query . $column.'='."'".$value."'";
		if ($i != count($data)) {
			$query .= ", ";
	}

}
	
	$query = $query . $string . $stringtail;
	
	$connection  = new connection();
	$conn = $connection->connect();

	$status = $conn->query($query);
	return $status;
}

function delete($table,$id){
	$query = "DELETE FROM $table WHERE ".$table."_id = '$id';";

	
	$connection  = new connection();
	$conn = $connection->connect();
	$status = $conn->query($query);
	return $status;
}



?>