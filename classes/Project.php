<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');

class Project{
	private $db;
	public function __construct(){
		$this->db = new Database();
	}
public function checkUser($username){
	$sql="SELECT * FROM user WHERE username='$username'";
	$getuser=$this->db->select($sql);
	if ($username=='') {
		echo '<span class="error">Enter username.</span>';
		exit();
	}elseif($getuser){
			echo '<span class="error"><br>$username</b> not available !!</span>';
			exit();
	}else {
			echo '<span class="success"><br>$username</b>  available !!</span>';
			exit();
}
	
}
public function checkUsername($name,$email){
$username=mysqli_real_escape_string($this->db->link,$name);
		$email = mysqli_real_escape_string($this->db->link, $email);

	$sql="SELECT username FROM user WHERE username='$name'";

	$getuser=$this->db->select($sql);
	if ($username=='') {
		echo '<span class="error">Enter username.</span>';
		exit();
	}elseif($getuser){
			echo '<span class="error"><br>$name</b> not available !!</span>';
			exit();
	}else {
			echo '<span class="success"><br>$name</b>  available !!</span>';
			exit();
	
}
		$getuser = $this->db->select($sql);
		if ($email == '') {
			echo '<span class="error">Enter Email.</span>';
			exit();
		} elseif ($getuser) {
			echo '<span class="error"><br>$email</b> not available !!</span>';
			exit();
		} else {
			echo '<span class="success"><br>$email</b> available !!</span>';
			exit();
		}
		
}
public function chkEmail($email){
		$email=mysqli_real_escape_string($this->db->link, $email);

		$sql = "SELECT email FROM user WHERE email='$email'";
		$getuser = $this->db->select($sql);
		if ($email == '') {
			echo '<span class="error">Enter Email.</span>';
			exit();
		} elseif ($getuser) {
			echo '<span class="error"><br>$email</b> not available !!</span>';
			exit();
		} else {
			echo '<span class="success"><br>$email</b> available !!</span>';
			exit();
		}
}
public function checkskill($skill){
		$skill = mysqli_real_escape_string($this->db->link, $skill);

		$sql = "SELECT * FROM skill WHERE skill LIKE '%$skill%'";
		$getskill= $this->db->select($sql);
		$result='';
		$result.='<div class="skill"><ul>';
		if ($getskill) {
			while ($data=$getskill->fetch_assoc()) {
				$result.='<li>'.$data['skill'].'</li>';
			}
		} else {
			$result .= '<li> No Result found.</li>';
		}
		$result .= '<ul></div>';
		echo $result;
		
}
public function AutofRefresh($body){
	$sql="INSERT INTO   refresh (body) VALUES('$body')";
	$data=$this->db->insert($sql);
	return $data;
}
public function getWithoutRefresh(){
		$sql = "SELECT * FROM refresh  ORDER BY id DESC";
		$getdata= $this->db->select($sql);
		$result = '';
		$result .= '<div class="data"><ul>';
		if ($getdata) {
			while ($data = $getdata->fetch_assoc()) {
				$result .= '<li>' . $data['body'] . '</li>';
			}
		} else {
			$result .= '<li> No Result found.</li>';
		}
		$result .= '<ul></div>';
		echo $result;
}
public function checkLiveSearch($livesearch){
		$sql = "SELECT * FROM datasearch WHERE name LIKE '%$livesearch%' OR username LIKE '%$livesearch%' ";
		$getdata = $this->db->select($sql);
		if ($getdata) {
			$data='';
			$data.="<table class='tblone'>
			<tr>
			<th>Name</th>
			<th>Username</th>
			<th>Email</th>
			</tr>";
			while ($result=$getdata->fetch_assoc()) {
				$data.='<tr>
				<td>'.$result['name'].'</td>
				<td>'.$result['username'].'</td>
				<td>'.$result['email'].'</td>
				</tr>';
			}
			echo $data;
		
		} else {
           echo 'Data not found.';
		}
		
}
public function ContentAutosave($postTitle, $postDescription, $postId){
	if ($postId !='') {
	   $sql="UPDATE autosave SET 
	   postTitle='$postTitle',
	   postDescription='$postDescription'
	   WHERE postId='$postId'";
	   $getdata=$this->db->update($sql);
	   return $getdata;
	}else{
			$sql = "INSERT INTO   autosave (postTitle,postDescription,post_status) VALUES('$postTitle','$postDescription',draft)";
			$insdata = $this->db->insert($sql);
			
			echo $insdata;
			exit();
	}
}
}
?>