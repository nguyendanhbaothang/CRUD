<?php
include_once './../db.php';

// Kiem tra nguoi dung da gui du lieu di
if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    // Debug du lieu dc gui len
    // echo '<pre>';
    // print_r( $_REQUEST );
    // die();

    // Lấy dữ liệu gửi lên
    $TENHANG    = $_REQUEST['TENHANG'];
    $MACONGTY   = $_REQUEST['MACONGTY'];

    $sql = "INSERT INTO `c10_mat_hang` 
    (`TENHANG`, `MACONGTY`, `MALOAIHANG`, `SOLUONG`, `DONVITINH`, `GIAHANG`) 
    VALUES 
    ('$TENHANG', '$MACONGTY', '1', '1', 'chiếc', '10000000') ";
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
    TENHANG: <input type="text" name="TENHANG" > <br>
    MACONGTY: <input type="text" name="MACONGTY" > <br>
    <button type="submit">Lưu</button>
</form>