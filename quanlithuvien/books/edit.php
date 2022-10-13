<?php
include_once '../../db.php';

$id = $_GET['id'];
// Debug gia tri lay xuong
// var_dump($id);
$sql = "SELECT * FROM `books` WHERE id = $id ";
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
    $category_id    = $_REQUEST['category_id'];
    $name   = $_REQUEST['name'];
    $price   = $_REQUEST['price'];
    $sql = "UPDATE `books` 
    SET 
        `category_id` = '$category_id', 
        `name` = '$name' ,
        `price` = '$price' 
    WHERE `books`. id = $id";
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
    THELOAI: <input type="text" name="category_id" value="<?= $row->category_id;?>" > <br>
    TEN: <input type="text" name="name" value="<?= $row->name;?>"> <br>
    GIA: <input type="text" name="price" value="<?= $row->price;?>"> <br>
    <button type="submit">Lưu</button>
</form>