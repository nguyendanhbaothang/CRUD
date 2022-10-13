<?php
include_once '../../db.php';
// echo' <pre>';
// print_r($_GET);
// die();
$id =$_GET['id'];
//debug giá trị lấy xuống
// var_dump(id);
$sql = "SELECT * FROM `oders_book` WHERE id = $id";
//debug câu sql
var_dump($sql);
//truyen cau truy van vao
$stmt = $conn->query($sql);

//Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_OBJ);//array => object

//fetch se tra ve duy nhất 1 ket qua
$row = $stmt->fetch();
//debug dữ liệu trả về
// echo' <pre>';
// print_r($row);
// die();

?>
<table border="1">
    <tr>
        <td> MƯỢN SÁCH </td>
        <td> <?php echo $row->students_id;?> </td>
        <td> <?php echo $row->date_borrow;?> </td>
        <td> <?php echo $row->date_pay;?> </td>
    </tr>

</table>