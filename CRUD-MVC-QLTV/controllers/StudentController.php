<?php
    //GOi model 
    include_once 'models/Student.php';
    class StudentController {
        
        // Hien thi tat ca
        public function index(){
            $objStudent = new Student();
            $items = $objStudent->all();
            // echo '<pre>';
            // print_r($items);
            // die();

            // truyen xuong view
            include_once 'views/students/list.php';
        }

        // Hien thi chi tiet
        public function show(){
            $id = $_GET['id'];
            $objStudent = new Student();
            $item = $objStudent->find($id);  
            include_once 'views/students/show.php';   
        }
        // Hien thi form them moi
        public function add(){  
            include_once 'views/students/add.php';
        }
        //Xu ly form them moi
        public function store(){
            $data=[
                'name'=> $_REQUEST['name'],
                'class'=> $_REQUEST['class'],
                'address'=> $_REQUEST['address'],
                'email'=> $_REQUEST['email'],
                'image'=> $_REQUEST['image']
            ];

            // echo '<pre>';
            // print_r($data);
            // die();
            $objStudent = new Student();
            $objStudent->save($data);
            header('Location: index.php?controller=student&page=index');

        }

        // Hien thi form edit
        public function edit(){
            $id = $_GET['id'];
            $objStudent = new Student();
            $item = $objStudent->find($id);
            include_once 'views/students/edit.php';

        }
        //Xu ly edit
        public function update(){
            $id = $_REQUEST['id'];
            $data = [
                'name'=> $_REQUEST['name'],
                'class'=> $_REQUEST['class'],
                'address'=> $_REQUEST['address'],
                'email'=> $_REQUEST['email'],
                'image'=> $_REQUEST['image']
              
            ];

            // echo '<pre>';
            // print_r($_REQUEST);
            // die();
            $objStudent = new Student();
            $objStudent->update($id, $data);

            header('Location: index.php?controller=student&page=index');

        }

        // Phuong thuc delete
        public function delete(){
            $id = $_REQUEST['id'];
            $objStudent = new Student();
            $objStudent->delete($id);
            header('Location: index.php?controller=student&page=index');

        }
        
    }