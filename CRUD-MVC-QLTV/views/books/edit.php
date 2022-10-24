<h1>Edit san pham</h1>
<form action="index.php?controller=book&page=update&id=<?php echo $item->id;?>" method="post">
    THELOAI: <input type="text" value = "<?php echo $item->category_id;?>" name="category_id"> <br>
    TEN: <input type="text" value = "<?php echo $item->name;?>" name="name"> <br>
    GIA: <input type="text" value = "<?php echo $item->price;?>" name="price"> <br>
    <button type="submit">Lưu</button>
</form>