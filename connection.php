<?php

$username = 'root';
$password = '';
$database = 'meritomaths';
$server = 'localhost';

$con = mysqli_connect($server,$username,$password);
$db = mysqli_select_db($con,$database);

if(!$con){
    ?>
    <script>
        alert("Database error");
    </script>
    <?php
}

?>