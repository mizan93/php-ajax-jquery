<?php
include_once '../classes/Project.php';
?>
<?php
$project = new Project();
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $body = $_POST['body'];
    $chkrefresh = $project->AutofRefresh($body);
}
