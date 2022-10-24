<h1>Thêm mới sản phẩm</h1>
<form action="index.php?controller=book&page=store" method="post">
<label for="cars">Danh mục sản phẩm:</label>

<select name="category_id" >
                    <?php if (isset($objBook)) : ?>
                        <?php foreach ($objBook as $obj) { ?>
                            <option value="<?= $obj->id ?>"><?= $obj->name_category?></option>
                        <?php  } ?><br>
                    <?php else : "";
                    endif; ?>
                   
                </select><br>
    TEN: <input type="text" name="name"> <br>
    GIA: <input type="text" name="price"> <br>
    <button type="submit">Lưu</button>
</form>