<?php
$con = mysqli_connect('localhost', 'root', '', 'shopping');
if ($con) {
    //echo "<script>alert('OK');</script>";
} else {
    echo "Connection failed";
}
