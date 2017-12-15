<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Shoping</title>

        <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.css" />
        <!-- <link href="<?= base_url() ?>assets/bootstrap/css/bootstrap-theme.css" rel="stylesheet" /> -->
        <link href="<?= base_url() ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/sweetalert-master/dist/sweetalert.css">
        <script src="<?= base_url() ?>assets/sweetalert-master/dist/sweetalert.min.js"></script>
        <script src="<?= base_url() ?>assets/bootstrap/js/jquery-3.1.1.min.js"></script>
	    <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

    </head>
	<style type="text/css">
		body{
			font-family: 'Itim', cursive;
            /*background-color: #D5DEF5;*/
		}
		#page{
			padding-top:5%;
		}
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
       
            /*right: 25px;
            font-size: 36px;*/
            margin-left: 170px;
        }

        @media screen and (max-height: 450px) {
          .sidenav {padding-top: 15px;}
          .sidenav a {font-size: 18px;}
        }
        div#count_cart {
            background-color: #ff0700;
            padding: 0px 5px;
            color: #fff;
            position: absolute;
            top: 23px;
            margin-left: 14px;
            border-radius: 5px;
        }
	</style>
    <body>
    <div id="mySidenav" class="sidenav">
      <a id="close" class="closebtn" onclick="closeNav()"><i class="fa fa-close"></i></a>
      <a href="<?= base_url() ?>index.php/product">เพิ่มสินค้า</a>
      <a href="<?= base_url() ?>index.php/backend/payment_list">ใบสั่งซื้อ</a>
      <a href="<?= base_url() ?>index.php/backend/member">ระบบสมาชิก</a>
    </div>