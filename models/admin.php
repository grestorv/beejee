<?php
	Class Model_Admin extends Model_Base{
		function returnData($from, $notesOnPage, $orderBy='id', $order){
			$db=$this->registry['db'];
            $allowed = array("name", "email", "complete");
            $key = array_search($orderBy, $allowed);
            $orderBy=$allowed[$key];
            $order = ($order=='ASC')? 'DESC' : 'ASC';
            $from=(int) $from;
            $notesOnPage=(int) $notesOnPage;

            $query = "SELECT * FROM problems ORDER BY $orderBy $order, id $order LIMIT $from,$notesOnPage";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $result=$stmt->get_result();

			for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
			foreach ($data as $key => $record) {
				$record['text']=htmlspecialchars($record['text']);
				$data[$key]=$record;
			}
			return $data;
		}
		function insertData($name, $email, $text){
				$db=$this->registry['db'];
                $query="INSERT INTO problems SET name=?, email=?, text=?";
                $stmt=$db->prepare($query);
                $stmt->bind_param('sss', $name, $email, $text);
                $stmt->execute();
                $result=$stmt->get_result();
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