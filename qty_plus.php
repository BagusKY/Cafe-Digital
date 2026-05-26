<?php

session_start();

/*
|--------------------------------------------------------------------------
| VALIDASI ID
|--------------------------------------------------------------------------
*/

if(!isset($_GET['id'])){

    die("Invalid Menu ID");

}

$id = $_GET['id'];

/*
|--------------------------------------------------------------------------
| VALIDASI CART
|--------------------------------------------------------------------------
*/

if(!isset($_SESSION['cart'][$id])){

    die("Cart item not found");

}

/*
|--------------------------------------------------------------------------
| UPDATE QUANTITY
|--------------------------------------------------------------------------
*/

$_SESSION['cart'][$id]['qty']++;

/*
|--------------------------------------------------------------------------
| AMBIL DATA ITEM
|--------------------------------------------------------------------------
*/

$item = $_SESSION['cart'][$id];

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Updating Cart...</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{

            min-height:100vh;

            display:flex;

            justify-content:center;

            align-items:center;

            overflow:hidden;

            background:
            radial-gradient(circle at top,
            #1f1f1f,
            #080808);

            font-family:Poppins,sans-serif;

            color:white;

        }

        .background-circle{

            position:absolute;

            border-radius:50%;

            background:
            rgba(255,152,0,0.08);

            animation:rotate 12s linear infinite;

        }

        .background-circle:nth-child(1){

            width:300px;
            height:300px;

            top:-120px;
            left:-120px;

        }

        .background-circle:nth-child(2){

            width:350px;
            height:350px;

            bottom:-140px;
            right:-140px;

        }

        @keyframes rotate{

            from{
                transform:rotate(0deg);
            }

            to{
                transform:rotate(360deg);
            }

        }

        .success-card{

            width:450px;

            background:
            rgba(255,255,255,0.05);

            backdrop-filter:blur(18px);

            border:
            1px solid rgba(255,255,255,0.08);

            border-radius:32px;

            padding:45px;

            text-align:center;

            box-shadow:
            0 15px 40px rgba(0,0,0,0.5);

            position:relative;

            z-index:2;

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

        .icon-circle{

            width:120px;
            height:120px;

            border-radius:50%;

            background:
            linear-gradient(45deg,#ff9800,#ff5722);

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

        .icon-circle i{

            font-size:52px;

            color:white;

        }

        .title{

            font-size:36px;

            font-weight:900;

            margin-bottom:15px;

        }

        .subtitle{

            color:#cfcfcf;

            line-height:1.8;

            margin-bottom:35px;

        }

        .menu-box{

            background:
            rgba(255,255,255,0.04);

            border-radius:22px;

            padding:20px;

            display:flex;

            align-items:center;

            margin-bottom:30px;

        }

        .menu-box img{

            width:90px;
            height:90px;

            object-fit:cover;

            border-radius:20px;

            margin-right:18px;

        }

        .menu-name{

            font-size:24px;

            font-weight:800;

            margin-bottom:8px;

        }

        .menu-qty{

            color:#ff9800;

            font-size:18px;

            font-weight:bold;

        }

        .spinner{

            width:45px;
            height:45px;

            border:
            4px solid rgba(255,255,255,0.08);

            border-top:
            4px solid #ff9800;

            border-radius:50%;

            margin:auto;

            margin-top:15px;

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

        .loading-text{

            margin-top:20px;

            color:#9e9e9e;

            font-size:14px;

        }

        .view-cart-btn{

            width:100%;

            display:inline-block;

            padding:17px;

            border-radius:18px;

            background:
            linear-gradient(45deg,#ff9800,#ff5722);

            color:white;

            text-decoration:none;

            font-size:18px;

            font-weight:700;

            margin-top:30px;

            transition:0.3s;

        }

        .view-cart-btn:hover{

            transform:translateY(-3px);

            box-shadow:
            0 10px 25px rgba(255,152,0,0.4);

        }

    </style>

</head>
<body>

<div class="background-circle"></div>
<div class="background-circle"></div>

<div class="success-card">

    <div class="icon-circle">

        <i class="fa fa-plus"></i>

    </div>

    <div class="title">

        Quantity Updated

    </div>

    <div class="subtitle">

        Your cart quantity has been successfully increased.

    </div>

    <div class="menu-box">

        <img src="<?= $item['gambar']; ?>">

        <div>

            <div class="menu-name">

                <?= $item['nama']; ?>

            </div>

            <div class="menu-qty">

                Total Qty :
                <?= $item['qty']; ?>

            </div>

        </div>

    </div>

    <div class="spinner"></div>

    <div class="loading-text">

        Redirecting back to shopping cart...

    </div>

    <a href="cart.php" class="view-cart-btn">

        <i class="fa fa-cart-shopping"></i>

        View Shopping Cart

    </a>

</div>

<script>

    setTimeout(function(){

        window.location.href = "cart.php";

    },2000);

</script>

</body>
</html>