<?php
        $connection = mysqli_connect('localhost','root','','student_ajax') or die('Connection failed');
        $id = $_POST['id'];
        $delete = "DELETE FROM student WHERE id = $id";
        if(mysqli_query($connection,$delete)){
            echo "success";
        }else{
            echo "fail";
        }
?>