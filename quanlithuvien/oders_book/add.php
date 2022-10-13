<?php
include_once '../../db.php';

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
  
    $sql = "INSERT INTO `oders_book` 
    (`students_id`, `date_borrow`, `date_pay`) 
    VALUES 
    ('$students_id', '$date_borrow', '$date_pay') ";
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
    HOCSINH: <input type="text" name="students_id" > <br>
    NGAYMUON: <input type="text" name="date_borrow" > <br>
    NGAYTRA: <input type="text" name="date_pay" > <br>
    <button type="submit">Lưu</button>
</form>