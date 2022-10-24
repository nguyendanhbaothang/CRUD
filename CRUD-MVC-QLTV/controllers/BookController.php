<?php
    include_once 'models/Book.php';
    include_once 'models/category.php';
    class BookController {
        
        // Hien thi tat ca
        public function index(){
            $objBook = new Book();
            $items =  $objBook->all();
            // var_dump($items);
            
            //goi view
            include_once 'views/books/list.php'; 
        }

        // Hien thi chi tiet
        public function show(){
            $id = $_GET['id'];
            $objBook = new Book();
            $item = $objBook->find($id);
            include_once 'views/books/show.php';
            
        }

        // Hien thi form them moi
        public function add(){
            $objBook = new Category();
            $objBook=$objBook->all();
            // print_r($objBook);
            // die();
            include_once 'views/books/add.php';
        }

        //Xu ly form them moi
        public function store(){
           
          //////lấy bảng cate để sổ danh mục trong phần add
          $Category = new Category();
          $cate = $Category->all();
      
            $data=[
                
                    'category_id'=> $_REQUEST['category_id'],
                    'name'=> $_REQUEST['name'],
                    'price'=> $_REQUEST['price']
            ]; 
            // echo '<pre>';
            // print_r($_REQUEST);
            // die();
            $objBook = new Book();
            
            $objBook->save($data);
            header('Location: index.php?controller=book&page=index');
        }

        // Hien thi form edit
        public function edit(){
            $id = $_GET['id'];
            $objBook = new Book();
            $item = $objBook->find($id);
            include_once 'views/books/edit.php';
        }
        //Xu ly edit
        public function update(){
            $id = $_REQUEST['id'];
            $data = [
                'category_id'=> $_REQUEST['category_id'],
                'name'=> $_REQUEST['name'],
                'price'=> $_REQUEST['price']
            ];
            $objBook = new Book();
            $objBook-> update( $id, $data );
            header('Location: index.php?controller=book&page=index');
        }

        // Phuong thuc delete
        public function delete(){
            $id = $_REQUEST['id'];
            $objBook = new Book();
            $objBook->delete($id);
            header('Location: index.php?controller=book&page=index');
        }
        
    }