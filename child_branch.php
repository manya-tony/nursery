<?php
if(isset($_POST['in'])){
$child_id = $_POST['id'];
header('Location:child_in.php?id='.$child_id);
exit();
}

if(isset($_POST['out'])){
$child_id = $_POST['id'];
header('Location:child_out.php?id='.$child_id);
exit();
}

if(isset($_POST['detail'])){
$child_id = $_POST['id'];
header('Location:child_detail.php?id='.$child_id);
exit();
}

if(isset($_POST['edit'])){
$child_id = $_POST['id'];
header('Location:child_edit.php?id='.$child_id);
exit();
}

if(isset($_POST['delete'])){
$child_id = $_POST['id'];
header('Location:child_delete.php?id='.$child_id);
exit();
}

?>
