<?php
include_once '../classes/Project.php';
?>
<?php
$project = new Project();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $skill = $_POST['skill'];
    $chkskill = $project->checkskill($skill);
}
