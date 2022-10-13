<?php
include_once '../../db.php';
$table = 'books';
$sql = "SELECT * FROM $table";
// echo $sql; 
// die();
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
<h1>Danh sách sản phẩm</h1>
<a href="add.php">Thêm mới</a>
<table border="1">
    <thead>
        <tr>
            <th>id</th>
            <th>category_id </th>
            <th>name</th>
            <th>price</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach( $rows as $key => $row ): ?>
            <tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->category_id; ?></td>
                <td><?php echo $row->name; ?></td>
                <td><?php echo $row->price; ?></td>
                <td>
                    <a href="show.php?id=<?php echo $row->id; ?>">Xem</a> | 
                    <a href="edit.php?id=<?php echo $row->id; ?>">Sua</a> | 
                    <a href="delete.php?id=<?php echo $row->id; ?>">Xoa</a> 
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>
        
