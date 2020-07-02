<?php
include_once '../classes/Project.php';
?>
<?php
$project = new Project();

    $getdata = $project->getWithoutRefresh();
?>
