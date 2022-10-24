<h1>Danh sach san pham</h1>
<a href="index.php?controller=student&page=add">Thêm mới</a> 
<table border="1">
    <thead>
        <tr>
            <th>id </th>
            <th>name</th>
            <th>class</th>
            <th>address</th>
            <th>email</th>
            <th>image</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach( $items as $key => $row ): ?>
        <tr>
            <td><?php echo $row->id; ?></td>
            <td><?php echo $row->name; ?></td>
            <td><?php echo $row->class; ?></td>
            <td><?php echo $row->address; ?></td>
            <td><?php echo $row->email; ?></td>
            <td><?php echo $row->image; ?></td>
            <td>
                <a href="index.php?controller=student&page=show&id=<?php echo $row->id; ?>">Xem</a> |
                <a href="index.php?controller=student&page=edit&id=<?php echo $row->id; ?>">Sửa</a> |
                <a href="index.php?controller=student&page=delete&id=<?php echo $row->id; ?>">Xóa</a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>