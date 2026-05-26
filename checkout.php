<?php

session_start();

if(empty($_SESSION['cart'])){

    header("Location: cart.php");
    exit;

}

$total = 0;

foreach($_SESSION['cart'] as $item){

    $total += $item['harga'] * $item['qty'];

}

$tax = $total * 0.1;

$service_fee = 5000;

$grand_total =
$total +
$tax +
$service_fee;

?>

<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Checkout | Cafe Digital</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet"
          href="assets/css/style.css">

    <style>

        body{
            background:#0b0b0b;
            color:white;
            overflow-x:hidden;
        }

        .checkout-hero{

            padding:100px 0 70px;

            text-align:center;

            background:
            radial-gradient(circle at top,
            rgba(255,152,0,0.15),
            transparent);

        }

        .checkout-hero h1{

            font-size:72px;
            font-weight:900;

            margin-bottom:20px;

        }

        .checkout-hero p{

            color:#bdbdbd;
            font-size:20px;

        }

        .checkout-card{

            background:
            linear-gradient(145deg,#1b1b1b,#121212);

            border-radius:30px;

            padding:40px;

            border:
            1px solid rgba(255,255,255,0.05);

            margin-bottom:40px;

            box-shadow:
            0 15px 40px rgba(0,0,0,0.4);

        }

        .section-title{

            font-size:34px;

            font-weight:800;

            margin-bottom:35px;

        }

        .form-label{

            color:#d0d0d0;

            margin-bottom:10px;

        }

        .form-control,
        .form-select{

            background:#1f1f1f;

            border:
            1px solid rgba(255,255,255,0.06);

            color:white;

            border-radius:18px;

            padding:15px;

        }

        .form-control:focus,
        .form-select:focus{

            background:#1f1f1f;
            color:white;

            border-color:#ff9800;

            box-shadow:
            0 0 0 0.2rem rgba(255,152,0,0.2);

        }

        textarea{
            min-height:130px;
        }

        .payment-option{

            background:#1f1f1f;

            border-radius:25px;

            padding:30px;

            text-align:center;

            transition:0.3s;

            cursor:pointer;

            border:
            2px solid transparent;

            height:100%;

        }

        .payment-option:hover{

            transform:translateY(-5px);

            border-color:#ff9800;

        }

        .payment-option i{

            font-size:40px;

            margin-bottom:20px;

            color:#ff9800;

        }

        .summary-card{

            background:
            linear-gradient(145deg,#1b1b1b,#111);

            border-radius:30px;

            padding:40px;

            position:sticky;

            top:100px;

            border:
            1px solid rgba(255,255,255,0.05);

        }

        .summary-title{

            font-size:36px;

            font-weight:800;

            margin-bottom:35px;

        }

        .order-item{

            display:flex;

            align-items:center;

            margin-bottom:25px;

        }

        .order-item img{

            width:75px;
            height:75px;

            object-fit:cover;

            border-radius:18px;

            margin-right:15px;

        }

        .order-name{

            font-weight:700;

            font-size:18px;

        }

        .order-price{

            color:#ff9800;

            font-weight:800;

        }

        .summary-item{

            display:flex;

            justify-content:space-between;

            margin-bottom:18px;

            color:#d0d0d0;

        }

        .summary-total{

            border-top:
            1px solid rgba(255,255,255,0.08);

            margin-top:25px;

            padding-top:25px;

        }

        .summary-total h3{

            color:#ff9800;

            font-size:42px;

            font-weight:900;

        }

        .checkout-btn{

            width:100%;

            border:none;

            border-radius:20px;

            padding:18px;

            background:
            linear-gradient(45deg,#ff9800,#ff5722);

            color:white;

            font-size:20px;

            font-weight:800;

            margin-top:30px;

            transition:0.3s;

        }

        .checkout-btn:hover{

            transform:translateY(-4px);

            box-shadow:
            0 10px 25px rgba(255,152,0,0.4);

        }

        .secure-box{

            margin-top:30px;

            background:
            rgba(255,255,255,0.04);

            border-radius:22px;

            padding:25px;

        }

        .secure-box p{

            color:#d0d0d0;

            margin-bottom:10px;

        }

        .secure-box i{

            color:#4caf50;

            margin-right:10px;

        }

        @media(max-width:768px){

            .checkout-hero h1{
                font-size:48px;
            }

            .summary-card{
                margin-top:40px;
            }

        }

    </style>

</head>
<body>

<div class="checkout-hero">

    <h1>
        CHECKOUT
    </h1>

    <p>
        Complete your premium coffee order experience.
    </p>

</div>

<div class="container mb-5">

    <form action="save_order.php"
          method="POST">

        <div class="row">

            <!-- LEFT -->

            <div class="col-lg-8">

                <div class="checkout-card">

                    <div class="section-title">

                        Customer Information

                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-4">

                            <label class="form-label">
                                Full Name
                            </label>

                            <input type="text"
                                   name="customer_name"
                                   class="form-control"
                                   required>

                        </div>

                        <div class="col-md-6 mb-4">

                            <label class="form-label">
                                Phone Number
                            </label>

                            <input type="text"
                                   name="phone"
                                   class="form-control"
                                   required>

                        </div>

                    </div>

                    <div class="mb-4">

                        <label class="form-label">
                            Email Address
                        </label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               required>

                    </div>

                    <div class="mb-4">

                        <label class="form-label">
                            Delivery Address
                        </label>

                        <textarea
                            name="address"
                            class="form-control"
                            required></textarea>

                    </div>

                </div>

                <!-- PAYMENT -->

                <div class="checkout-card">

                    <div class="section-title">

                        Payment Method

                    </div>

                    <div class="mb-4">

                        <select name="payment_method"
                                class="form-select"
                                required>

                            <option value="">
                                Choose Payment Method
                            </option>

                            <option value="QRIS">
                                QRIS
                            </option>

                            <option value="E-Wallet">
                                E-Wallet
                            </option>

                            <option value="Cash">
                                Cash
                            </option>

                        </select>

                    </div>

                    <div class="row">

                        <div class="col-md-4 mb-4">

                            <div class="payment-option">

                                <i class="fa fa-qrcode"></i>

                                <h5>QRIS</h5>

                                <p class="text-secondary">
                                    Fast Digital Payment
                                </p>

                            </div>

                        </div>

                        <div class="col-md-4 mb-4">

                            <div class="payment-option">

                                <i class="fa fa-wallet"></i>

                                <h5>E-Wallet</h5>

                                <p class="text-secondary">
                                    OVO, Dana, GoPay
                                </p>

                            </div>

                        </div>

                        <div class="col-md-4 mb-4">

                            <div class="payment-option">

                                <i class="fa fa-money-bill"></i>

                                <h5>Cash</h5>

                                <p class="text-secondary">
                                    Pay On Delivery
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->

            <div class="col-lg-4">

                <div class="summary-card">

                    <div class="summary-title">

                        Order Summary

                    </div>

                    <?php foreach($_SESSION['cart'] as $item) : ?>

                    <?php
                    $subtotal =
                    $item['harga'] * $item['qty'];
                    ?>

                    <div class="order-item">

                        <img src="<?= $item['gambar']; ?>">

                        <div>

                            <div class="order-name">

                                <?= $item['nama']; ?>

                            </div>

                            <small class="text-secondary">

                                Qty :
                                <?= $item['qty']; ?>

                            </small>

                        </div>

                        <div class="ms-auto order-price">

                            Rp <?= number_format($subtotal); ?>

                        </div>

                    </div>

                    <?php endforeach; ?>

                    <div class="summary-item">

                        <span>Subtotal</span>

                        <span>
                            Rp <?= number_format($total); ?>
                        </span>

                    </div>

                    <div class="summary-item">

                        <span>Tax</span>

                        <span>
                            Rp <?= number_format($tax); ?>
                        </span>

                    </div>

                    <div class="summary-item">

                        <span>Service Fee</span>

                        <span>
                            Rp <?= number_format($service_fee); ?>
                        </span>

                    </div>

                    <div class="summary-total">

                        <div class="d-flex justify-content-between align-items-center">

                            <h5>Total</h5>

                            <h3>

                                Rp <?= number_format($grand_total); ?>

                            </h3>

                        </div>

                    </div>

                    <button class="checkout-btn">

                        <i class="fa fa-lock"></i>

                        Complete Order

                    </button>

                    <div class="secure-box">

                        <p>

                            <i class="fa fa-check-circle"></i>

                            Secure payment system

                        </p>

                        <p>

                            <i class="fa fa-check-circle"></i>

                            Fast checkout process

                        </p>

                        <p class="mb-0">

                            <i class="fa fa-check-circle"></i>

                            Premium customer support

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>