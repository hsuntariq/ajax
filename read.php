<?php
    $connection = mysqli_connect('localhost','root','','student_ajax') or die('Connection failed');
    $select = "SELECT * FROM student";
    $result = mysqli_query($connection,$select);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
?>
<tr>
    <td><?php echo $row['id']?></td>
    <td><?php echo $row['name']?></td>
    <td><?php echo $row['email']?></td>
    <td><?php echo $row['age']?></td>
    <td>
        <button class="btn btn-danger delete" value="<?php echo $row['id']?>">Delete</button>
    </td>
</tr>

<?php }}?>