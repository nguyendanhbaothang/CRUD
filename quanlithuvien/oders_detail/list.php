<?php
include_once '../../db.php';
$sql = "SELECT * FROM `oders_detail` ";
// echo $sql; die();
//truyen cau truy van vao
$stmt = $conn->query($sql);
//Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_OBJ);//array => object
//fetchALL se tra ve du lieu nhieu hon 1 ket qua
$rows = $stmt->fetchAll();
// echo '<pre>';
// print_r($rows);
// die();
?>
<h1>Danh sách các loại sách sẽ được cho thuê</h1>
<a href="add.php">Thêm mới</a>
<?php if( isset( $_GET['msg'] )  && $_GET['msg'] == 'OK' ):?>
<p>Them thanh cong</p>
<?php endif;?>
<table border="1">
    <thead>
        <tr>
            <th>id</th>
            <th>oders_book_id  </th>
            <th>book_id </th>
            <th>quantily</th>
            <th>total_price</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach( $rows as $key => $row ): ?>
        <tr>
            <td><?= $row->id; ?></td>
            <td><?= $row->oders_book_id; ?></td>
            <td><?= $row->book_id ; ?></td>
            <td><?= $row->quantily; ?></td>
            <td><?= $row->total_price; ?></td>
            <td>
                <a href="show.php?id=<?= $row->id; ?>">Xem</a> |
                <a href="edit.php?id=<?= $row->id; ?>">Sửa</a> |
                <a href="delete.php?id=<?= $row->id; ?>">Xóa</a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>