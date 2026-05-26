<?php
session_start();
?>

<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Shopping Cart | Cafe Digital</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <style>

        body{
            background:#0b0b0b;
            color:white;
            overflow-x:hidden;
        }

        .cart-hero{

            padding:100px 0 70px;

            text-align:center;

            background:
            radial-gradient(circle at top,
            rgba(255,152,0,0.15),
            transparent);

        }

        .cart-hero h1{

            font-size:72px;
            font-weight:900;

            margin-bottom:20px;

        }

        .cart-hero p{

            color:#bdbdbd;
            font-size:20px;

        }

        .cart-card{

            background:
            linear-gradient(145deg,#1b1b1b,#121212);

            border-radius:30px;

            overflow:hidden;

            border:
            1px solid rgba(255,255,255,0.05);

            box-shadow:
            0 15px 40px rgba(0,0,0,0.4);

        }

        .cart-item{

            padding:30px;

            border-bottom:
            1px solid rgba(255,255,255,0.06);

            transition:0.3s;

        }

        .cart-item:hover{

            background:
            rgba(255,255,255,0.02);

        }

        .cart-item img{

            width:130px;
            height:130px;

            object-fit:cover;

            border-radius:25px;

        }

        .menu-title{

            font-size:28px;
            font-weight:800;

            margin-bottom:10px;

        }

        .menu-category{

            color:#9e9e9e;

            margin-bottom:20px;

        }

        .price{

            color:#ff9800;

            font-size:32px;

            font-weight:800;

        }

        .quantity-box{

            display:flex;

            align-items:center;

            gap:15px;

            margin-top:20px;

        }

        .qty-btn{

            width:45px;
            height:45px;

            border:none;

            border-radius:50%;

            background:
            linear-gradient(45deg,#ff9800,#ff5722);

            color:white;

            font-weight:bold;

            transition:0.3s;

            text-decoration:none;

            display:flex;
            align-items:center;
            justify-content:center;

        }

        .qty-btn:hover{

            transform:scale(1.1);

            box-shadow:
            0 10px 25px rgba(255,152,0,0.4);

        }

        .remove-btn{

            text-decoration:none;

            color:#ff5252;

            font-weight:600;

            transition:0.3s;

        }

        .remove-btn:hover{

            color:#ff1744;

        }

        .summary-card{

            background:
            linear-gradient(145deg,#1a1a1a,#111);

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

        .summary-item{

            display:flex;

            justify-content:space-between;

            margin-bottom:18px;

            color:#cfcfcf;

        }

        .summary-total{

            border-top:
            1px solid rgba(255,255,255,0.08);

            margin-top:25px;

            padding-top:25px;

        }

        .summary-total h3{

            font-size:42px;

            color:#ff9800;

            font-weight:900;

        }

        .checkout-btn{

            width:100%;

            padding:18px;

            border:none;

            border-radius:20px;

            background:
            linear-gradient(45deg,#ff9800,#ff5722);

            color:white;

            font-size:20px;

            font-weight:700;

            margin-top:30px;

            transition:0.3s;

            text-decoration:none;

            display:block;

            text-align:center;

        }

        .checkout-btn:hover{

            transform:translateY(-4px);

            box-shadow:
            0 10px 25px rgba(255,152,0,0.4);

        }

        .empty-cart{

            padding:120px 40px;

            text-align:center;

        }

        .empty-cart i{

            font-size:120px;

            color:#ff9800;

            margin-bottom:30px;

        }

        .empty-cart h2{

            font-size:42px;

            font-weight:800;

            margin-bottom:20px;

        }

        .empty-cart p{

            color:#9e9e9e;

            margin-bottom:35px;

        }

        .shop-btn{

            padding:16px 30px;

            border-radius:18px;

            background:
            linear-gradient(45deg,#ff9800,#ff5722);

            color:white;

            text-decoration:none;

            font-weight:700;

        }

        @media(max-width:768px){

            .cart-hero h1{
                font-size:48px;
            }

            .summary-card{
                margin-top:40px;
            }

            .cart-item img{
                width:100%;
                height:250px;
                margin-bottom:20px;
            }

        }

    </style>

</head>
<body>

<div class="cart-hero">

    <h1>
        YOUR CART
    </h1>

    <p>
        Review your premium coffee order before checkout.
    </p>

</div>

<div class="container mb-5">

    <div class="row">

        <!-- LEFT -->

        <div class="col-lg-8">

            <div class="cart-card">

                <?php if(!empty($_SESSION['cart'])) : ?>

                <?php

                $total = 0;

                foreach($_SESSION['cart'] as $id => $item) :

                $subtotal = $item['harga'] * $item['qty'];

                $total += $subtotal;

                ?>

                <div class="cart-item">

                    <div class="row align-items-center">

                        <div class="col-md-3">

                            <img src="<?= $item['gambar']; ?>">

                        </div>

                        <div class="col-md-5">

                            <div class="menu-title">

                                <?= $item['nama']; ?>

                            </div>

                            <div class="menu-category">

                                Premium Cafe Menu

                            </div>

                            <div class="quantity-box">

                                <a href="qty_minus.php?id=<?= $id; ?>"
                                   class="qty-btn">

                                    -

                                </a>

                                <span>

                                    <?= $item['qty']; ?>

                                </span>

                                <a href="qty_plus.php?id=<?= $id; ?>"
                                   class="qty-btn">

                                    +

                                </a>

                            </div>

                            <div class="mt-4">

                                <a href="remove_cart.php?id=<?= $id; ?>"
                                   class="remove-btn">

                                    <i class="fa fa-trash"></i>

                                    Remove Item

                                </a>

                            </div>

                        </div>

                        <div class="col-md-4 text-md-end mt-4 mt-md-0">

                            <div class="price">

                                Rp <?= number_format($subtotal); ?>

                            </div>

                        </div>

                    </div>

                </div>

                <?php endforeach; ?>

                <?php else : ?>

                <div class="empty-cart">

                    <i class="fa fa-cart-shopping"></i>

                    <h2>
                        Cart Masih Kosong
                    </h2>

                    <p>
                        Belum ada menu yang ditambahkan ke cart.
                    </p>

                    <a href="menu.php" class="shop-btn">

                        <i class="fa fa-mug-hot"></i>

                        Explore Menu

                    </a>

                </div>

                <?php endif; ?>

            </div>

        </div>

        <!-- RIGHT -->

        <div class="col-lg-4">

            <div class="summary-card">

                <div class="summary-title">

                    Order Summary

                </div>

                <div class="summary-item">

                    <span>Subtotal</span>

                    <span>
                        Rp <?= number_format($total ?? 0); ?>
                    </span>

                </div>

                <div class="summary-item">

                    <span>Tax</span>

                    <span>
                        Rp <?= number_format(($total ?? 0) * 0.1); ?>
                    </span>

                </div>

                <div class="summary-item">

                    <span>Service Fee</span>

                    <span>
                        Rp 5,000
                    </span>

                </div>

                <?php
                $grandTotal =
                ($total ?? 0) +
                (($total ?? 0) * 0.1) +
                5000;
                ?>

                <div class="summary-total">

                    <div class="d-flex justify-content-between align-items-center">

                        <h5>Total</h5>

                        <h3>

                            Rp <?= number_format($grandTotal); ?>

                        </h3>

                    </div>

                </div>

                <a href="checkout.php"
                   class="checkout-btn">

                    <i class="fa fa-credit-card"></i>

                    Proceed Checkout

                </a>

            </div>

        </div>

    </div>

</div>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>