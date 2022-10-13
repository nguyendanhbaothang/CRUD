<?php
include_once '../../db.php';

$id = $_GET['id'];
// Debug gia tri lay xuong
// var_dump($id);
$sql = "SELECT * FROM `oders_book` WHERE id = $id ";
// Debug cau SQL
// var_dump($sql);

//truyen cau truy van vao
$stmt = $conn->query($sql);
//Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_OBJ);//array => object
//fetch se tra ve duy nhất 1 ket qua
$row = $stmt->fetch();
// Debug dữ liệu trả về
// Kiem tra nguoi dung da gui du lieu di
if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    // Debug du lieu dc gui len
    // echo '<pre>';
    // print_r( $_REQUEST );
    // die();

    // Lấy dữ liệu gửi lên
    $students_id    = $_REQUEST['students_id'];
    $date_borrow    = $_REQUEST['date_borrow'];
    $date_pay    = $_REQUEST['date_pay'];

    $sql = "UPDATE `oders_book` 
        SET 
            `students_id` = '$students_id',     
            `date_borrow` = '$date_borrow',     
            `date_pay` = '$date_pay'    
        WHERE `category`.id = $id";
    // Debug sql
    // var_dump($sql);
    // die();
    // THuc hien truy van
    try {
        $conn->exec($sql);
        // CHuyển hướng về danh sách
        header("Location: list.php?msg=OK");
    } catch (Exception $e) {
        // CHuyển hướng về danh sách
        header("Location: list.php?msg=FAIL");
    }
}

?>
<h1>Thêm mơi sản phẩm</h1>
<form action="" method="post">
    HOCSINH: <input type="text" name="students_id" value="<?= $row->students_id;?>" > <br>
    NGAYMUON: <input type="date" name="date_borrow" value="<?= $row->date_borrow;?>" > <br>
    NGAYTRA: <input type="date" name="date_pay" value="<?= $row->date_pay;?>" > <br>
    <button type="submit">Lưu</button>
</form>