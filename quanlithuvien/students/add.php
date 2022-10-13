<?php
include_once '../../db.php';

// Kiem tra nguoi dung da gui du lieu di
if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    // Debug du lieu dc gui len
    // echo '<pre>';
    // print_r( $_REQUEST );
    // die();

    // Lấy dữ liệu gửi lên
    $name = $_REQUEST['name'];
    $class = $_REQUEST['class'];
    $address= $_REQUEST['address'];
    $email= $_REQUEST['email'];
    $image= $_REQUEST['image'];

    $sql = "INSERT INTO `students` 
    (`name`, `class`, `address`,`email`,`image`) 
    VALUES 
    ('$name','$class','$address','$email','$image')";
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
    TÊN: <input type="text" name="name" > <br>
    LỚP: <input type="text" name="class" > <br>
    ĐỊA CHỈ: <input type="text" name="address" > <br>
    EMAIL: <input type="text" name="email" > <br>
    HÌNH ẢNH: <input type="text" name="image" > <br>
    <button type="submit">Lưu</button>
</form>