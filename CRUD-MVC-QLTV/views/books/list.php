<h1>Danh sach san pham</h1>
<a href="index.php?controller=book&page=add">Thêm mới</a> 
<table border="1">
    <thead>
        <tr>
            <th>id </th>
            <th>category_id</th>
            <th>name</th>
            <th>price</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach( $items as $key => $row ): ?>
        <tr>
            <td><?php echo $row->id; ?></td>
            <td><?php echo $row->categoryName; ?></td>
            <td><?php echo $row->name; ?></td>
            <td><?php echo $row->price; ?></td>
            <td>
                <a href="index.php?controller=book&page=show&id=<?php echo $row->id; ?>">Xem</a> |
                <a href="index.php?controller=book&page=edit&id=<?php echo $row->id; ?>">Sửa</a> |
                <a href="index.php?controller=book&page=delete&id=<?php echo $row->id; ?>">Xóa</a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>