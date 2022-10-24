<?php
    class Category {
        protected $table = 'category';
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
            $name_category = $data['name_category'];
          
            $sql = "INSERT INTO `category` 
            ( `name_category`)
             VALUES 
             ( '$name_category')";
            //  var_dump($sql);
            //  die();
              $conn->exec($sql);

        }

        // cap nhat record
       public function update( $id, $data ){
            $name_category = $data['name_category'];
            global $conn;
            $sql = "UPDATE `category`
            SET 
               `name_category` = '$name_category'
               WHERE `category`.`id` = $id ";
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