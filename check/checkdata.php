<?php 
include_once 'lib/Database.php';
include_once 'classes/Project.php';
?>
<?php
$project=new Project();
if($_SERVER['REQUEST_METHOD']=='POST')
{
 $name=$_POST['username'];
    $emai = $_POST['email'];
    $pass = $_POST['userpass'];

$chkusr=$project->checkUsername($name,$email, $pass);

}
?>
// elseif(isset($_POST['email']))
// {

//    $chkusr=$project->chkEmail($email);
// }else{
//    $insertdta=$project->insertUser($_POST);
// }
