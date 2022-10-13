<?php
include_once '../../db.php';

// Kiem tra nguoi dung da gui du lieu di
if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    // Debug du lieu dc gui len
    // echo '<pre>';
    // print_r( $_REQUEST );
    // die();

    // Lấy dữ liệu gửi lên
    $oders_book_id     = $_REQUEST['oders_book_id'];
    $book_id     = $_REQUEST['book_id'];
    $quantily    = $_REQUEST['quantily'];
    $total_price    = $_REQUEST['total_price'];

    $sql = "INSERT INTO `oders_detail` 
    (`oders_book_id`, `book_id`, `quantily`,`total_price`) 
    VALUES 
    ('$oders_book_id','$book_id','$quantily','$total_price')";
    // Debug sql
    // print_r($sql);

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
    DONSACH: <input type="text" name="oders_book_id" > <br>
    SACH: <input type="text" name="book_id" > <br>
    SOLUONG: <input type="text" name="quantily" > <br>
    TONG: <input type="text" name="total_price" > <br>
    <button type="submit">Lưu</button>
</form>