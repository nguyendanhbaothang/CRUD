<?php
include_once '../../db.php';

$id = $_GET['id'];
// Debug gia tri lay xuong
// var_dump($id);
$sql = "SELECT * FROM `students` WHERE id = $id ";
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
    $name = $_REQUEST['name'];
    $class = $_REQUEST['class'];
    $address= $_REQUEST['address'];
    $email= $_REQUEST['email'];
    $image= $_REQUEST['image'];

    $sql = "UPDATE `students` 
        SET 
            `name` = '$name',     
            `class` = '$class',     
            `address` = '$address' ,   
            `email` = '$email',    
            `image` = '$image'    
        WHERE `students`.id = $id";
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
    TÊN: <input type="text" name="name" value="<?= $row->name;?>" > <br>
    LỚP: <input type="text" name="class" value="<?= $row->class;?>" > <br>
    ĐỊA CHỈ: <input type="text" name="address" value="<?= $row->address;?>" > <br>
    EMAIL: <input type="text" name="email" value="<?= $row->email;?>" > <br>
    ẢNH: <input type="text" name="image" value="<?= $row->image;?>" > <br>
    <button type="submit">Lưu</button>
</form>