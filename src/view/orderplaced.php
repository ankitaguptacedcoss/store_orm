<?php
//when order placed redirect to user.php
$msg = $_REQUEST['msg'];
echo "<p class='msg'>".$msg."</p>";
echo "<script>window.location.href='../view/user.php'</script>";
?>