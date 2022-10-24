<h1>Edit san pham</h1>
<form action="index.php?controller=category&page=update&id=<?php echo $item->id;?>" method="post">
    THELOAI: <input type="text" value = "<?php echo $item->name_category;?>" name="name_category"> <br>
    <button type="submit">Lưu</button>
</form>