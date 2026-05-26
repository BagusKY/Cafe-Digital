<?php

session_start();

include 'config/database.php';

if(!isset($_GET['id'])){

    die("Menu tidak ditemukan");

}

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM menu WHERE id='$id'");

$menu = mysqli_fetch_assoc($query);

if(!$menu){

    die("Data menu tidak valid");

}

/*
|--------------------------------------------------------------------------
| ADD TO CART PROCESS
|--------------------------------------------------------------------------
*/

if(isset($_SESSION['cart'][$id])){

    $_SESSION['cart'][$id]['qty'] += 1;

}else{

    $_SESSION['cart'][$id] = [

        'id' => $menu['id'],
        'nama' => $menu['nama'],
        'harga' => $menu['harga'],
        'gambar' => $menu['gambar'],
        'qty' => 1

    ];

}

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Adding To Cart...</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{

            background:
            radial-gradient(circle at top left,#1f1f1f,#0a0a0a);

            min-height:100vh;

            display:flex;

            justify-content:center;

            align-items:center;

            overflow:hidden;

            font-family:Poppins,sans-serif;

            color:white;

        }

        .success-card{

            width:420px;

            background:rgba(255,255,255,0.05);

            backdrop-filter:blur(20px);

            border:1px solid rgba(255,255,255,0.08);

            border-radius:30px;

            padding:45px;

            text-align:center;

            box-shadow:
            0 10px 40px rgba(0,0,0,0.5);

            animation:fadeUp 0.7s ease;

        }

        @keyframes fadeUp{

            from{
                opacity:0;
                transform:translateY(40px);
            }

            to{
                opacity:1;
                transform:translateY(0);
            }

        }

        .check-circle{

            width:110px;

            height:110px;

            background:
            linear-gradient(45deg,#ff9800,#ff5722);

            border-radius:50%;

            display:flex;

            justify-content:center;

            align-items:center;

            margin:auto;

            margin-bottom:30px;

            animation:pulse 2s infinite;

        }

        @keyframes pulse{

            0%{
                transform:scale(1);
                box-shadow:0 0 0 0 rgba(255,152,0,0.5);
            }

            70%{
                transform:scale(1.05);
                box-shadow:0 0 0 25px rgba(255,152,0,0);
            }

            100%{
                transform:scale(1);
            }

        }

        .check-circle i{

            font-size:50px;

            color:white;

        }

        .title{

            font-size:34px;

            font-weight:800;

            margin-bottom:15px;

        }

        .subtitle{

            color:#c7c7c7;

            font-size:16px;

            line-height:1.7;

            margin-bottom:35px;

        }

        .menu-preview{

            background:rgba(255,255,255,0.04);

            border-radius:20px;

            padding:20px;

            display:flex;

            align-items:center;

            margin-bottom:30px;

        }

        .menu-preview img{

            width:90px;

            height:90px;

            object-fit:cover;

            border-radius:18px;

            margin-right:18px;

        }

        .menu-name{

            font-size:22px;

            font-weight:700;

            margin-bottom:8px;

        }

        .menu-price{

            color:#ff9800;

            font-weight:bold;

            font-size:20px;

        }

        .loading-text{

            margin-top:20px;

            color:#9e9e9e;

            font-size:14px;

        }

        .spinner{

            width:45px;

            height:45px;

            border:4px solid rgba(255,255,255,0.1);

            border-top:4px solid #ff9800;

            border-radius:50%;

            margin:auto;

            margin-top:20px;

            animation:spin 1s linear infinite;

        }

        @keyframes spin{

            from{
                transform:rotate(0deg);
            }

            to{
                transform:rotate(360deg);
            }

        }

        .btn-cart{

            width:100%;

            padding:16px;

            border:none;

            border-radius:18px;

            background:
            linear-gradient(45deg,#ff9800,#ff5722);

            color:white;

            font-size:18px;

            font-weight:700;

            transition:0.3s;

            text-decoration:none;

            display:inline-block;

            margin-top:25px;

        }

        .btn-cart:hover{

            transform:translateY(-3px);

            box-shadow:
            0 10px 25px rgba(255,152,0,0.4);

        }

        .floating{

            position:absolute;

            border-radius:50%;

            background:rgba(255,152,0,0.08);

            animation:float 10s infinite linear;

        }

        .floating:nth-child(1){

            width:200px;
            height:200px;

            top:-60px;
            left:-60px;

        }

        .floating:nth-child(2){

            width:300px;
            height:300px;

            bottom:-100px;
            right:-100px;

        }

        @keyframes float{

            from{
                transform:rotate(0deg);
            }

            to{
                transform:rotate(360deg);
            }

        }

    </style>

</head>
<body>

<div class="floating"></div>
<div class="floating"></div>

<div class="success-card">

    <div class="check-circle">

        <i class="fa fa-check"></i>

    </div>

    <div class="title">

        Added To Cart

    </div>

    <div class="subtitle">

        Your favorite menu has been successfully added into shopping cart.

    </div>

    <div class="menu-preview">

        <img src="<?= $menu['gambar']; ?>">

        <div>

            <div class="menu-name">

                <?= $menu['nama']; ?>

            </div>

            <div class="menu-price">

                Rp <?= number_format($menu['harga']); ?>

            </div>

        </div>

    </div>

    <div class="spinner"></div>

    <div class="loading-text">

        Redirecting to cart page...

    </div>

    <a href="cart.php" class="btn-cart">

        <i class="fa fa-shopping-cart"></i>

        View Shopping Cart

    </a>

</div>

<script>

    setTimeout(function(){

        window.location.href = "cart.php";

    },2500);

</script>

</body>
</html>