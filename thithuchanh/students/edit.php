<?php
 include_once '../db.php';
$id = $_REQUEST['id'];
// echo $id;
$sql = "SELECT * FROM students";    
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
//fetch se tra ve du lieu 1 ket qua
$rows = $stmt->fetchAll();

$sql = "SELECT * FROM students WHERE id='$id'";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
//fetch se tra ve du lieu 1 ket qua
$items = $stmt->fetch();

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_REQUEST['name'];
    $class	 = $_REQUEST['class'];
    $birthday = $_REQUEST['birthday'];
    $gender	 = $_REQUEST['gender'];
    $thongtin	 = $_REQUEST['thongtin'];
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
 $sql = "UPDATE students SET `name` = '$name', `class` = '$class', `birthday` = '$birthday', `gender` = '$gender', `thongtin` = '$thongtin'  WHERE id='$id'";
   
    $conn->query($sql);
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
    <style>
        span {
            color: red;
        }
    </style>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form method="post" action="">
            <legend>students edit</legend>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">name</label>
                <input type="text" name="name" id="" class="form-control" value="<?php echo $items->name; ?>">
                <label for="disabledTextInput" class="form-label">class</label>
                <input type="text" name="class" id="" class="form-control" value="<?php echo $items->class; ?>">
                <label for="disabledTextInput" class="form-label">birthday</label>
                <input type="text" name="birthday" id="" class="form-control" value="<?php echo $items->birthday; ?>">
                <label for="disabledTextInput" class="form-label">gender</label>
                <input type="text" name="gender" id="" class="form-control" value="<?php echo $items->gender; ?>">
                <label for="disabledTextInput" class="form-label">phone</label>
                <input type="text" name="thongtin" id="" class="form-control" value="<?php echo $items->thongtin; ?>">
             
             
          
                <span><?php
                if (isset($errors['name'])) {
                    echo $errors['name'];
                        }
                if (isset($errors['class'])) {
                    echo $errors['class'];
                        }
                if (isset($errors['birthday'])) {
                    echo $errors['birthday'];
                        }
                if (isset($errors['gender'])) {
                    echo $errors['gender'];
                        }
                if (isset($errors['thongtin'])) {
                    echo $errors['thongtin'];
                        }
                          ?></span>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-danger">cancel</a>
        </form>
    </div>
</body>
</html>