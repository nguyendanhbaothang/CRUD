<?php
include_once '../../db.php';

// Kiem tra nguoi dung da gui du lieu di
if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    // Debug du lieu dc gui len
    // echo '<pre>';
    // print_r( $_REQUEST );
    // die();

    // Lấy dữ liệu gửi lên
    $category_id    = $_REQUEST['category_id'];
    $name   = $_REQUEST['name'];
    $price   = $_REQUEST['price'];

      $sql = "INSERT INTO `books` 
      (`category_id`, `name`, `price`) 
      VALUES 
      ('$category_id', '$name', ' $price ') ";
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
    THELOAI: <input type="text" name="category_id" > <br>
    TEN: <input type="text" name="name" > <br>
    GIA: <input type="text" name="price" > <br>
    <button type="submit">Lưu</button>
</form>