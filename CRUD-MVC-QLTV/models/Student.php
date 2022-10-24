<?php
    class Student {
        protected $table = 'students';
        // goi CSDL lay tat ca records
        public function all(){
            global $conn;
            $sql = "SELECT * FROM $this->table ";
            $stmt = $conn->query($sql);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $rows = $stmt->fetchAll();
            return $rows;
        }       

        //goi CSDL lay chi tiet record
        public function find($id){
            
            global $conn;
            $sql = "SELECT * FROM $this->table WHERE id  = $id";
            $stmt = $conn->query($sql);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $row = $stmt->fetch();
            return  $row;
        }

        //them moi record
        public function save( $data ){
            global $conn;
            $name = $data['name'];
            $class = $data['class'];
            $address = $data['address'];
            $email = $data['email'];
            $image = $data['image'];
          
            $sql = "INSERT INTO `students` 
            ( `name`,`class`,`address`,`email`,`image`)
             VALUES 
             ( '$name','$class','$address','$email','$image')";
            //  var_dump($sql);
            //  die();
              $conn->exec($sql);

        }

        // cap nhat record
       public function update( $id, $data ){
        $name = $data['name'];
        $class = $data['class'];
        $address = $data['address'];
        $email = $data['email'];
        $image = $data['image'];
            global $conn;
            $sql = "UPDATE `students`
            SET 
               `name` = '$name',
               `class` = '$class',
               `address` = '$address',
               `email` = '$email',
               `image` = '$image'
               WHERE `students`.`id` = $id ";
            //    print_r($sql);
            //    die();
            $conn->exec($sql);

        }

        // xoa record
        public function delete($id){
            global $conn;
            $sql = "DELETE FROM $this->table WHERE id  = $id";
            // var_dump($sql);
            // die();
            $conn->exec($sql);


        }
    }