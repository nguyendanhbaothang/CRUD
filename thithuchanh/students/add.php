<?php
 
include_once "../db.php";

$sql = "SELECT * FROM class";

$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
//fetch se tra ve du lieu 1 ket qua
$rows = $stmt->fetchAll();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $class = $_POST['class'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $thongtin = $_POST['thongtin'];
    
  
   

            if($name == ''){
              $err['name']="không thể để trống mục này!";
          }   
          if($class == ''){
              $err['class']="không thể để trống mục này!";
          }  
          if($birthday == ''){
            $err['birthday']="không thể để trống mục này!";
          }   
          if($gender == ''){
          $err['gender']="không thể để trống mục này!";
          }
          if($thongtin == ''){
            $err['thongtin']="không thể để trống mục này!";
            }      
          if(empty($err)){
              $sql = "INSERT INTO `students` 
                  (`name`,`class`,`birthday`,`gender`,`thongtin`) 
                  VALUES 
                  ('$name','$class','$birthday','$gender','$thongtin')";
    
    // echo $sql;
    
    $conn->exec($sql);
    header('location:index.php');
}
}
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<form method = 'POST'>
  
  <label for="disabledTextInput"></label><br>
  <input type="text" id="fname" class="form-control" placeholder="Tên học sinh" name="name"><br>
  <span><?php if(isset($err['name'])){echo $err['name'];}; ?></span><br>

  <label for="fname"></label><br>
  <select name="class" placeholder="Lớp" class="form-control" id="">
                    <?php foreach ($rows as $row) {?>
                    <option value="<?=$row->id;?>"><?=$row->name_class;?></option>
                    <?php } ?>
                </select><br>
  <label for="disabledTextInput"></label><br>
  <input type="date" id="fname" class="form-control" placeholder="Ngày sinh" name="birthday"><br>
  <span><?php if(isset($err['birthday'])){echo $err['birthday'];}; ?></span><br>

  <label for="disabledTextInput"></label><br>

  <input type="radio" id="male" value="Nam"  name="gender" checked>
  <label for="male">Nam</label><br>
  <input type="radio" id="famale" value="Nữ" name="gender" checked>
  <label for="famale">Nữ</label><br>
  

  <label for="disabledTextInput"></label><br>
  <input type="text" id="fname" class="form-control" placeholder="Số điện thoại" name="thongtin"><br>
  <span><?php if(isset($err['thongtin'])){echo $err['thongtin'];}; ?></span><br>

  
  <input type="submit"  value="Thêm">
  <a href="index.php" class="btn btn-danger">Huỷ</a>

</form>
</body>
</html>







