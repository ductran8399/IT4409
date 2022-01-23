<?php
$commentId = isset($_POST['comment_id']) ? $_POST['comment_id'] : "";
$comment = isset($_POST['comment']) ? $_POST['comment'] : "";
$commentSenderId = isset($_POST['user_id']) ? $_POST['user_id'] : "";
$commentSProductId = isset($_GET['item_id']) ? $_GET['item_id'] : "";
$date = date('Y-m-d H:i:s');

$sql = "INSERT INTO tbl_comment(product_id,user_id,content,timestamp,parent_comment_id) VALUES ('" . $commentSProductId . "','" . $commentSenderId . "','" . $comment . "','" . $date . "','" . $commentId . "')";

$result = mysqli_query($conn, $sql);

if (! $result) {
    $result = mysqli_error($conn);
}
echo $result;
?>
