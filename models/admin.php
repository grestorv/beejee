<?php
	Class Model_Admin extends Model_Base{
		function returnData($from, $notesOnPage, $orderBy='id'){
			$db=$this->registry['db'];
			$query="SELECT * FROM problems";
			$query = "SELECT * FROM problems ORDER BY $orderBy LIMIT $from,$notesOnPage";
			$result=mysqli_query($db,$query) or die(mysqli_error($db));
			for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
			foreach ($data as $key => $record) {
				$record['text']=htmlspecialchars($record['text']);
				$data[$key]=$record;
			}
			return $data;
		}
		function insertData($name, $email, $text){
				$db=$this->registry['db'];
				$name=mysqli_real_escape_string($db, $name);
				$email=mysqli_real_escape_string($db,$email);
				$text=mysqli_real_escape_string($db, $text);
				$query="INSERT INTO problems SET name='$name', email='$email', text='$text'";
				$result = mysqli_query($db,$query) or die(mysqli_error($db));
				return $result;
		}
		function countOfPages(){
			$db=$this->db;
			$query = "SELECT COUNT(*) as count FROM problems";
			$countOfRecords = mysqli_query($db,$query) or die(mysqli_error($db));
			$count = mysqli_fetch_assoc($countOfRecords)['count'];
			return $count;
		}
	}