<?php
include_once '../classes/Project.php';
?>
<?php
$project = new Project();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $livesearch = $_POST['livesearch'];
    $chklivesch= $project->checkLiveSearch($livesearch);
}
