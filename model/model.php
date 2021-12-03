<?php
class Model extends Database{
	//$tbl = user
	//$_POST = array("name"=>"kamal","email"=>"abc@gmail.com","pass"=>"as12")

	public function insert($tbl,$data){

		$columns = "";
		$values = "";
		$bind = array();

		foreach($data as $col=>$val){
			$columns .= $col.",";
			$values .= "?,";
			$bind[] = $val;
			//$values .= "'".$val."',";
		}

		$columns = "(".substr($columns,0,-1).")";
		$values = "VALUES(".substr($values,0,-1).")";

		//insert into tbl(a,b) values(?,?)			
		$sql = "INSERT INTO ".$tbl.$columns." ".$values;
		$stmt = $this->conn->prepare($sql);
			if($stmt->execute($bind)){
				return true;
			}
		return false;
	}


	// SELECT v1_columns FROM v2_tbl WHERE v3_logic ORDER BY v4_column v5_asc/v5_desc LIMIT v6_limit  
	public function select($tbl,$columns="*",$where="",$orderby_column="",$asc_desc="",$limit=""){
		$sql = "SELECT ";

		if($columns != "*"){
			$sql .= $columns." FROM ".$tbl;
		}
		else{
		  $sql = "SELECT * FROM ".$tbl;
		}

		if($where != ""){
			$sql .= " WHERE ".$where;
		}

		if($orderby_column != ""){
			$sql .= " ORDER BY ".$orderby_column;
		}

		if($asc_desc != ""){
			$sql .= " ".$asc_desc;
		}

		if($limit != ""){
			$sql .= " LIMIT ".$limit;
		}

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt->fetchAll();
		$count = $stmt->rowCount();

		$data = ["count"=>$count,"rows"=>$rows];

		return $data;
		//print_r($row);
	}

	// SELECT * FROM tabl_1 INNIR JOIN tbl_2 ON tbl_1.col=tbl_2.col WHERE tbl_1.col='1' 
	// $arg = [
	// 	"cols" =>"tbl_1.col1,tbl_2.col1,tbl_1.col2",
	// 	"tables" => ["tbl_1","tbl_2"],
	//  "join" => "tbl_1.col=tbl_2.col",
	// 	"where" => [
	// 		["columns","operator","value"],
	// 		["columns","operator","value"],
	// 		["columns","operator","value"],
	// 	],
	// 	"logical" => ["opt1","opt2"],
	// 	"order_by" => [],
	// 	"asc_desc" => [],
	// 	"limit" => []
	// ];

	public function innerJoin($arg){
		
		$sql = "SELECT ".$arg['cols']." FROM ".$arg['tables'][0]." INNER JOIN ".$arg['tables'][1]." ON ".$arg['join'];

		if(isset($arg['where']) && count($arg['where']) > 0){
			$bind = [];
			foreach ($arg['where'] as $key => $value) {
				if($key > 0){
					// old_ WHERE col1=? / new_ AND col2 < ?
					$sql .= " ".$arg["logical"][$key-1]." ".$value[0].$value[1]."?";
					$bind[] = $value[2];
				}
				else{
					// WHERE col1=?
					$sql .= " WHERE ".$value[0].$value[1]."?"; 
					$bind[] = $value[2];
				}
			}
		}

		if(isset($arg['order_by']) && count($arg['order_by']) > 0){
			$sql .= " ".$arg['order_by'];
			if(count($arg['asc_desc']) > 0){
				$sql .= " ".$arg['asc_desc'];
			}
		}

		if(isset($arg['limit']) && count($arg['limit']) > 0){
			$sql .= " ".$arg['limit'];
		}

		$stmt = $this->conn->prepare($sql);
		if(isset($bind)){
			$stmt->execute($bind);
		}
		else{
			$stmt->execute();
		}		
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt->fetchAll();
		$count = $stmt->rowCount();

		$data = ["count"=>$count,"rows"=>$rows];

		return $data;
	}

	/* $col_data = array(
		"full_name" => "Kamal",
		"email" => "abc@gmail.com"
	);*/

	//UPDATE tbl SET col_1=?,col_2=? WHERE id=?
	public function update($tbl, $col_data, $where){
		$sql = "UPDATE ".$tbl." SET ";
		$col = "";
		$val = array();

		foreach ($col_data as $key => $value) {
			$col .= $key."=?,";
			$val[] = $value;
		}

		$col = substr($col, 0,-1)." ";
		$sql .=  $col." WHERE ".$where;


		$stmt = $this->conn->prepare($sql);
		if($stmt->execute($val)){
			return true;
		}
		return false;
	}


	public function delete($tbl,$where){
		$sql = "DELETE FROM ".$tbl." WHERE ".$where;

		$stmt = $this->conn->prepare($sql);
		if($stmt->execute()){
			return true;
		}
		return false;
	}
}

?>