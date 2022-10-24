<h1>Edit san pham</h1>
<form action="index.php?controller=student&page=update&id=<?php echo $item->id;?>" method="post">
    TÊN: <input type="text" value = "<?php echo $item->name;?>" name="name"> <br>
    LỚP: <input type="text" value = "<?php echo $item->class;?>" name="class"> <br>
    ĐỊA CHỈ: <input type="text" value = "<?php echo $item->address;?>" name="address"> <br>
    EMAIL: <input type="text" value = "<?php echo $item->email;?>" name="email"> <br>
    HÌNH ẢNH: <input type="text" value = "<?php echo $item->image;?>" name="image"> <br>
    <button type="submit">Lưu</button>
</form>