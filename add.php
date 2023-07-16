<?php
    $name = $_POST['myName'];
    $email = $_POST['myEmail'];
    $age = $_POST['myAge'];
    $connection = mysqli_connect('localhost','root','','student_ajax') or die('Connection failed');
    $insert = "INSERT INTO student (name,email,age) VALUES ('{$name}','{$email}',{$age})";
    if(mysqli_query($connection,$insert)){
        echo 'success';
    }else{
        echo 'fail';
    }
?>