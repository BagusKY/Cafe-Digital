<?php

session_start();

/*
|--------------------------------------------------------------------------
| HITUNG TOTAL ITEM SEBELUM DIHAPUS
|--------------------------------------------------------------------------
*/

$totalItems = 0;

if(isset($_SESSION['cart'])){

    foreach($_SESSION['cart'] as $item){

        $totalItems += $item['qty'];

    }

}

/*
|--------------------------------------------------------------------------
| CLEAR CART
|--------------------------------------------------------------------------
*/

unset($_SESSION['cart']);

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Clearing Cart...</title>

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
            rgba(255,82,82,0.08);

            animation:rotate 15s linear infinite;

        }

        .background-circle:nth-child(1){

            width:320px;
            height:320px;

            top:-140px;
            left:-140px;

        }

        .background-circle:nth-child(2){

            width:380px;
            height:380px;

            bottom:-160px;
            right:-160px;

        }

        @keyframes rotate{

            from{
                transform:rotate(0deg);
            }

            to{
                transform:rotate(360deg);
            }

        }

        .clear-card{

            width:500px;

            background:
            rgba(255,255,255,0.05);

            backdrop-filter:blur(20px);

            border:
            1px solid rgba(255,255,255,0.08);

            border-radius:35px;

            padding:50px;

            text-align:center;

            position:relative;

            z-index:2;

            box-shadow:
            0 15px 40px rgba(0,0,0,0.5);

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

            width:130px;
            height:130px;

            border-radius:50%;

            background:
            linear-gradient(45deg,#ff5252,#ff1744);

            display:flex;

            justify-content:center;
            align-items:center;

            margin:auto;

            margin-bottom:35px;

            animation:pulse 2s infinite;

        }

        @keyframes pulse{

            0%{
                transform:scale(1);
                box-shadow:0 0 0 0 rgba(255,82,82,0.5);
            }

            70%{
                transform:scale(1.05);
                box-shadow:0 0 0 25px rgba(255,82,82,0);
            }

            100%{
                transform:scale(1);
            }

        }

        .icon-circle i{

            font-size:58px;

            color:white;

        }

        .title{

            font-size:42px;

            font-weight:900;

            margin-bottom:15px;

        }

        .subtitle{

            color:#cfcfcf;

            line-height:1.9;

            margin-bottom:35px;

            font-size:16px;

        }

        .info-box{

            background:
            rgba(255,255,255,0.04);

            border-radius:24px;

            padding:25px;

            margin-bottom:35px;

        }

        .info-number{

            font-size:52px;

            font-weight:900;

            color:#ff5252;

            margin-bottom:10px;

        }

        .info-text{

            color:#bdbdbd;

            font-size:16px;

        }

        .spinner{

            width:48px;
            height:48px;

            border:
            4px solid rgba(255,255,255,0.08);

            border-top:
            4px solid #ff5252;

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

        .action-btn{

            width:100%;

            display:inline-block;

            padding:18px;

            border-radius:20px;

            background:
            linear-gradient(45deg,#ff5252,#ff1744);

            color:white;

            text-decoration:none;

            font-size:18px;

            font-weight:700;

            margin-top:35px;

            transition:0.3s;

        }

        .action-btn:hover{

            transform:translateY(-3px);

            box-shadow:
            0 10px 25px rgba(255,82,82,0.4);

        }

    </style>

</head>
<body>

<div class="background-circle"></div>
<div class="background-circle"></div>

<div class="clear-card">

    <div class="icon-circle">

        <i class="fa fa-trash-can"></i>

    </div>

    <div class="title">

        Cart Cleared

    </div>

    <div class="subtitle">

        All items have been successfully removed from your shopping cart.

    </div>

    <div class="info-box">

        <div class="info-number">

            <?= $totalItems; ?>

        </div>

        <div class="info-text">

            Total items removed from cart
        </div>

    </div>

    <div class="spinner"></div>

    <div class="loading-text">

        Redirecting to menu page...

    </div>

    <a href="menu.php" class="action-btn">

        <i class="fa fa-mug-hot"></i>

        Continue Shopping

    </a>

</div>

<script>

    setTimeout(function(){

        window.location.href = "menu.php";

    },2500);

</script>

</body>
</html>