<?php

session_start();

include 'config/database.php';

/*
|--------------------------------------------------------------------------
| VALIDASI CART
|--------------------------------------------------------------------------
*/

if(empty($_SESSION['cart'])){

    die("Cart is empty");

}

/*
|--------------------------------------------------------------------------
| AMBIL DATA FORM
|--------------------------------------------------------------------------
*/

$customer_name = $_POST['customer_name'];
$phone          = $_POST['phone'];
$email          = $_POST['email'];
$address        = $_POST['address'];
$payment_method = $_POST['payment_method'];

/*
|--------------------------------------------------------------------------
| HITUNG TOTAL
|--------------------------------------------------------------------------
*/

$subtotal = 0;

foreach($_SESSION['cart'] as $item){

    $subtotal += $item['harga'] * $item['qty'];

}

$tax = $subtotal * 0.1;

$service_fee = 5000;

$grand_total =
$subtotal +
$tax +
$service_fee;

/*
|--------------------------------------------------------------------------
| INSERT ORDER
|--------------------------------------------------------------------------
*/

mysqli_query($conn, "

INSERT INTO orders(

customer_name,
phone,
email,
address,
payment_method,
subtotal,
tax,
service_fee,
grand_total

)

VALUES(

'$customer_name',
'$phone',
'$email',
'$address',
'$payment_method',
'$subtotal',
'$tax',
'$service_fee',
'$grand_total'

)

");

/*
|--------------------------------------------------------------------------
| AMBIL ORDER ID
|--------------------------------------------------------------------------
*/

$order_id = mysqli_insert_id($conn);

/*
|--------------------------------------------------------------------------
| INSERT ORDER ITEMS
|--------------------------------------------------------------------------
*/

foreach($_SESSION['cart'] as $item){

    $menu_name = $item['nama'];

    $price = $item['harga'];

    $qty = $item['qty'];

    $item_subtotal =
    $price * $qty;

    mysqli_query($conn, "

    INSERT INTO order_items(

    order_id,
    menu_name,
    price,
    qty,
    subtotal

    )

    VALUES(

    '$order_id',
    '$menu_name',
    '$price',
    '$qty',
    '$item_subtotal'

    )

    ");

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

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Order Success</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

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

        .success-card{

            width:520px;

            background:
            rgba(255,255,255,0.05);

            backdrop-filter:blur(18px);

            border:
            1px solid rgba(255,255,255,0.08);

            border-radius:35px;

            padding:50px;

            text-align:center;

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
            linear-gradient(45deg,#4caf50,#2e7d32);

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
                box-shadow:0 0 0 0 rgba(76,175,80,0.5);
            }

            70%{
                transform:scale(1.05);
                box-shadow:0 0 0 25px rgba(76,175,80,0);
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

            line-height:1.8;

            margin-bottom:35px;

        }

        .invoice-box{

            background:
            rgba(255,255,255,0.04);

            border-radius:25px;

            padding:30px;

            text-align:left;

        }

        .invoice-item{

            display:flex;

            justify-content:space-between;

            margin-bottom:18px;

            color:#d0d0d0;

        }

        .total{

            border-top:
            1px solid rgba(255,255,255,0.08);

            padding-top:20px;

            margin-top:20px;

        }

        .total h3{

            color:#4caf50;

            font-size:36px;

            font-weight:900;

        }

        .home-btn{

            width:100%;

            display:inline-block;

            padding:18px;

            border-radius:20px;

            background:
            linear-gradient(45deg,#4caf50,#2e7d32);

            color:white;

            text-decoration:none;

            font-size:18px;

            font-weight:700;

            margin-top:35px;

            transition:0.3s;

        }

        .home-btn:hover{

            transform:translateY(-3px);

            box-shadow:
            0 10px 25px rgba(76,175,80,0.4);

        }

    </style>

</head>
<body>

<div class="success-card">

    <div class="icon-circle">

        <i class="fa fa-check"></i>

    </div>

    <div class="title">

        Order Success

    </div>

    <div class="subtitle">

        Your order has been successfully processed.

    </div>

    <div class="invoice-box">

        <div class="invoice-item">

            <span>Order ID</span>

            <span>
                #<?= $order_id; ?>
            </span>

        </div>

        <div class="invoice-item">

            <span>Customer</span>

            <span>
                <?= $customer_name; ?>
            </span>

        </div>

        <div class="invoice-item">

            <span>Payment</span>

            <span>
                <?= $payment_method; ?>
            </span>

        </div>

        <div class="invoice-item">

            <span>Subtotal</span>

            <span>
                Rp <?= number_format($subtotal); ?>
            </span>

        </div>

        <div class="invoice-item">

            <span>Tax</span>

            <span>
                Rp <?= number_format($tax); ?>
            </span>

        </div>

        <div class="invoice-item">

            <span>Service Fee</span>

            <span>
                Rp <?= number_format($service_fee); ?>
            </span>

        </div>

        <div class="invoice-item total">

            <h5>Total</h5>

            <h3>
                Rp <?= number_format($grand_total); ?>
            </h3>

        </div>

    </div>

    <a href="index.php"
       class="home-btn">

        <i class="fa fa-house"></i>

        Back To Home

    </a>

</div>

</body>
</html>