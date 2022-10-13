<?php
include_once '../../db.php';

$id = $_GET['id'];
// Debug gia tri lay xuong
// var_dump($id);
$sql = "SELECT * FROM `oders_detail` WHERE id = $id ";
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
    $oders_book_id     = $_REQUEST['oders_book_id'];
    $book_id    = $_REQUEST['book_id'];
    $quantily    = $_REQUEST['quantily'];
    $total_price    = $_REQUEST['total_price'];

    $sql = "UPDATE `oders_detail` 
        SET 
            `oders_book_id` = '$oders_book_id',     
            `book_id` = '$book_id',     
            `quantily` = '$quantily' ,   
            `total_price` = '$total_price'    
        WHERE `oders_detail`.id = $id";
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
    DONSACH: <input type="text" name="oders_book_id" value="<?= $row->oders_book_id;?>" > <br>
    SACH: <input type="text" name="book_id" value="<?= $row->book_id;?>" > <br>
    SOLUONG: <input type="text" name="quantily" value="<?= $row->quantily;?>" > <br>
    TONG: <input type="text" name="total_price" value="<?= $row->total_price;?>" > <br>
    <button type="submit">Lưu</button>
</form>