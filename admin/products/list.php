<?php
include_once './../db.php';
$table = 'c10_mat_hang';
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
<?  ?>



<table border="1">
    <thead>
        <tr>
            <th>MAHANG</th>
            <th>TENHANG</th>
            <th>MACONGTY</th>
            <th>MALOAIHANG</th>
            <th>SOLUONG</th>
            <th>DONVITINH</th>
            <th>GIAHANG</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach( $rows as $key => $row ): ?>
            <tr>
                <td><?php echo $row->MAHANG; ?></td>
                <td><?php echo $row->TENHANG; ?></td>
                <td><?php echo $row->MACONGTY; ?></td>
                <td><?php echo $row->MALOAIHANG; ?></td>
                <td><?php echo $row->SOLUONG; ?></td>
                <td><?php echo $row->DONVITINH; ?></td>
                <td><?php echo $row->GIAHANG; ?></td>
                <td>
                    <a href="show.php?id=<?php echo $row->MAHANG; ?>">Xem</a> | 
                    <a href="update.php?id=<?php echo $row->MAHANG; ?>">Sua</a> | 
                    <a href="delete.php?id=<?php echo $row->MAHANG; ?>">Xoa</a> 
                    
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>
        

