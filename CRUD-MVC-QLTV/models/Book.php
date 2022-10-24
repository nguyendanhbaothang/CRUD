<?php
    class Book {
        protected $table = 'books';
        protected $table1 = 'category';
        // goi CSDL lay tat ca records
        public function all(){
            global $conn;
            $sql = "SELECT books.*,category.name_category as categoryName 
            FROM books join category on books.category_id  = category.id ";
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
            $category_id = $data['category_id'];
            $name = $data['name'];
            $price = $data['price'];
            $sql = "INSERT INTO `books` 
            ( `category_id`,`name`,`price`)
             VALUES 
             ( '$category_id','$name','$price')";
            //  var_dump($sql);
            //  die();
              $conn->exec($sql);

        }
        

        // cap nhat record
        public function update( $id, $data ){
            $category_id = $data['category_id'];
            $name = $data['name'];
            $price = $data['price'];
            global $conn;
            $sql = "UPDATE `books`
            SET 
              `category_id` = '$category_id',
               `name` = '$name',
               `price` = '$price'
            WHERE `books`.`id` = $id ";
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