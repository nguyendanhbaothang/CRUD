<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Danh Sách Học Sinh</h1>
</body>
</html>
<?php 
include_once "../db.php";
global $conn;
        $sql = "SELECT * FROM students JOIN class ON students.class = class.name_class";  
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
//fetchALL se tra ve du lieu nhieu hon 1 ket qua
$rows = $stmt->fetchAll();
?>

<table border=1>
    <tr>
        <th >Mã học sinh</th>    
        <th>Tên học sinh</th>        
        <th>Lớp</th>        
        <th>Tuỳ chỉnh</th>        
       
    </tr>
    <?php foreach($rows as $key=> $row) : ?>
    <tr>
        <td><?=$key + 1?></td>
        <td><?=$row->name?></td>
        <td><?=$row->class?></td>
        <td>
        <a class="btn btn-success" href="edit.php?id=<?=$value->id?>">Chỉnh sửa</a>
        <a class="btn btn-success" href="edit.php?id=<?=$value->id?>">Xoá</a>
        <a class="btn btn-success" href="edit.php?id=<?=$value->id?>">Xem</a>
    </td>
       
        
    </tr>
    <?php endforeach; ?>


</table>