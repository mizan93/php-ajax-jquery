<?php
include_once '../classes/Project.php';
?>
<?php
$project = new Project();
if (isset($_POST["postTitle"]) && isset($_POST["postDescription"])){
    $postTitle = $_POST['postTitle'];
    $postDescription  = $_POST['postDescription '];
    $postId  = $_POST['postId '];
    $autosave = $project->ContentAutosave($postTitle, $postDescription,$postId);
}
