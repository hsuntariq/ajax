<?php
        $connection = mysqli_connect('localhost','root','','student_ajax') or die('Connection failed');
        $search = $_POST['search'];
        $searchResult = "SELECT * FROM student WHERE name LIKE '{$search}%'" ;
        $result = mysqli_query($connection,$searchResult);
        if($result){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
        ?>
<tr>
    <td><?php echo $row['id']?></td>
    <td><?php echo $row['name']?></td>
    <td><?php echo $row['email']?></td>
    <td><?php echo $row['age']?></td>
</tr>

<?php }}}
else{
    echo "fail";
}
?>