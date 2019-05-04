<?php
if(isset($_POST["subject"]))
{
include("koneksi.php");
$subject = mysqli_real_escape_string($con, $_POST["subject"]);
$comment = mysqli_real_escape_string($con, $_POST["comment"]);
$query = "Update INTO comments(comment_subject, comment_text)VALUES ('$subject', '$comment')";
mysqli_query($con, $query);
}
?>