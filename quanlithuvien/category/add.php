<?php
include_once '../../db.php';

// Kiem tra nguoi dung da gui du lieu di
if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    // Debug du lieu dc gui len
    // echo '<pre>';
    // print_r( $_REQUEST );
    // die();

    // Lấy dữ liệu gửi lên
    $name_category    = $_REQUEST['name_category'];
  

      $sql = "INSERT INTO `category` 
      (`name_category`) 
      VALUES 
      ('$name_category') ";
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
    TENTHELOAI: <input type="text" name="name_category" > <br>
    <button type="submit">Lưu</button>
</form>