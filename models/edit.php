<?php
	Class Model_Edit extends Model_Base{
		function returnData($id){
                $db=$this->registry['db'];
                $query="SELECT * FROM problems WHERE id= ?";
                $stmt = $db->prepare($query);
                $stmt->bind_param('i', $id);
                $stmt->execute();
                $result=$stmt->get_result();
                $data=mysqli_fetch_assoc($result);
                $data['text']=htmlspecialchars($data['text']);
                return $data;
		}
		function updateData($id, $name, $email, $text, $complete, $redacted=0){
				$db=$this->registry['db'];
				$name=mysqli_real_escape_string($db, $name);
				$email=mysqli_real_escape_string($db,$email);
				$text=mysqli_real_escape_string($db, $text);
				$complete=mysqli_real_escape_string($db, $complete);
				/*if(!$redacted)
				$query="UPDATE problems SET name='$name', email='$email', text='$text', complete='$complete', redacted=0 WHERE id=$id";
				else $query="UPDATE problems SET name='$name', email='$email', text='$text', complete='$complete', redacted=1 WHERE id=$id";*/
                $query="UPDATE problems SET name= ?, email=?, text=?, complete=?, redacted=? WHERE id=?";
                $stmt = $db->prepare($query) or die(mysqli_error($db));
                $stmt->bind_param('sssiii', $name, $email, $text, $complete, $redacted, $id);
                $stmt->execute();
                $result=$stmt->get_result();
				return $result;
		}
	}