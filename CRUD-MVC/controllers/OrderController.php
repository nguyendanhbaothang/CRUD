<?php
    include_once 'models/Order.php';
    class OrderController {
        // Hien thi tat ca
        public function index(){
            $objOrders= new Orders();
            $items =  $objOrders->all();
            // var_dump($items);
            //goi view
            include_once 'views/orders/list.php'; 
        }
        // Hien thi chi tiet
        public function show(){
            $id = $_GET['id'];
            $objOrders= new Orders();
            $item = $objOrders->find($id);
            include_once 'views/orders/show.php';
        }
        // Hien thi form them moi
        public function add(){
            include_once 'views/orders/add.php';
        }
        //Xu ly form them moi
        public function store(){
            $data=[
                'MAKHACHHANG'=> $_REQUEST['MAKHACHHANG'],
                'MANHANVIEN'       => $_REQUEST['MANHANVIEN'],
                'NGAYDATHANG'      => $_REQUEST['NGAYDATHANG'],
                'NGAYGIAOHANG'      => $_REQUEST['NGAYGIAOHANG'],
                'NGAYCHUYENHANG'      => $_REQUEST['NGAYCHUYENHANG'],
                'NOIGIAOHANG'      => $_REQUEST['NOIGIAOHANG']
            ];
            // echo '<pre>';
            // print_r($data);
            // die();
            $objOrders = new Orders();
            $objOrders->save($data);
            header('Location: index.php?controller=order&page=index');
        }
        // Hien thi form edit
        public function edit(){
            $id = $_GET['id'];
            $objOrders = new Orders();
            $item = $objOrders->find($id);
            include_once 'views/orders/edit.php';
        }
        //Xu ly edit
        public function update(){
            $id = $_REQUEST['id'];
            $data=[
                'MAKHACHHANG'=> $_REQUEST['MAKHACHHANG'],
                'MANHANVIEN'       => $_REQUEST['MANHANVIEN'],
                'NGAYDATHANG'      => $_REQUEST['NGAYDATHANG'],
                'NGAYGIAOHANG'      => $_REQUEST['NGAYGIAOHANG'],
                'NGAYCHUYENHANG'      => $_REQUEST['NGAYCHUYENHANG'],
                'NOIGIAOHANG'      => $_REQUEST['NOIGIAOHANG']
            ];

            $objOrders = new Orders();
                //   print_r(123);
                //  die();
            $objOrders->update($id, $data);
            header('Location: index.php?controller=order&page=index');
        }
        // Phuong thuc delete
        public function delete(){
            $id = $_REQUEST['id'];
            $objOrders = new Orders();
            $objOrders->delete($id);
            header('Location: index.php?controller=order&page=index');
        }
        
    }