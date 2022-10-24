<h1>Danh sach san pham</h1>
<a href="index.php?controller=category&page=add">Thêm mới</a> 
<table border="1">
    <thead>
        <tr>
            <th>id </th>
            <th>name_category</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach( $items as $key => $row ): ?>
        <tr>
            <td><?php echo $row->id; ?></td>
            <td><?php echo $row->name_category; ?></td>
            <td>
                <a href="index.php?controller=category&page=show&id=<?php echo $row->id; ?>">Xem</a> |
                <a href="index.php?controller=category&page=edit&id=<?php echo $row->id; ?>">Sửa</a> |
                <a href="index.php?controller=category&page=delete&id=<?php echo $row->id; ?>">Xóa</a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>