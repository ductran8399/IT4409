<?php
require_once ('database/dbhelper.php');

$sql = "SELECT * FROM tbl_comment ORDER BY parent_comment_id asc, id asc";

$result = mysqli_query($conn, $sql);
$record_set = array();
while ($row = mysqli_fetch_assoc($result)) {
	//$result["comment_sender_name"]=executeSingleResult("SELECT tbl_user.username from tbl_user where tbl_user.id={$result['user_id']}")[0];
	array_push($record_set, $row);
}
mysqli_free_result($result);

mysqli_close($conn);
echo json_encode($record_set);
?>