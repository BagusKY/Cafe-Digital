<?php
include 'config/database.php';

$data = mysqli_query($conn, "SELECT * FROM menu");
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Menu Cafe | Cafe Digital</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <style>

        body{
            background:#0b0b0b;
            color:white;
            overflow-x:hidden;
        }

        .menu-hero{

            min-height:55vh;

            background:
            linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),
            url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=1400');

            background-size:cover;
            background-position:center;

            display:flex;
            align-items:center;
            justify-content:center;
            text-align:center;

            position:relative;

        }

        .menu-hero::before{

            content:'';

            position:absolute;

            width:100%;
            height:100%;

            background:
            radial-gradient(circle at top right,
            rgba(255,152,0,0.2),
            transparent);

        }

        .hero-content{
            position:relative;
            z-index:2;
        }

        .hero-content h1{

            font-size:78px;
            font-weight:900;
            letter-spacing:3px;

            margin-bottom:20px;

        }

        .hero-content p{

            font-size:20px;
            color:#d0d0d0;

            max-width:700px;

            margin:auto;

        }

        .menu-section{
            padding:100px 0;
        }

        .section-title{

            text-align:center;
            margin-bottom:60px;

        }

        .section-title h2{

            font-size:54px;
            font-weight:800;

        }

        .section-title p{

            color:#9e9e9e;
            font-size:18px;

        }

        .search-box{

            background:#1a1a1a;

            border-radius:25px;

            padding:18px 25px;

            display:flex;
            align-items:center;

            margin-bottom:50px;

            border:1px solid rgba(255,255,255,0.05);

        }

        .search-box input{

            background:none;
            border:none;
            outline:none;

            color:white;

            width:100%;

            margin-left:15px;

            font-size:17px;

        }

        .search-box i{
            color:#ff9800;
            font-size:22px;
        }

        .filter-container{

            display:flex;
            justify-content:center;
            flex-wrap:wrap;

            gap:15px;

            margin-bottom:60px;

        }

        .filter-btn{

            padding:12px 28px;

            border:none;

            border-radius:50px;

            background:#1d1d1d;

            color:white;

            transition:0.3s;

            font-weight:600;

        }

        .filter-btn:hover,
        .filter-btn.active{

            background:
            linear-gradient(45deg,#ff9800,#ff5722);

            transform:translateY(-3px);

        }

        .menu-card{

            background:
            linear-gradient(145deg,#1b1b1b,#121212);

            border-radius:28px;

            overflow:hidden;

            transition:0.4s;

            height:100%;

            position:relative;

            border:
            1px solid rgba(255,255,255,0.05);

        }

        .menu-card:hover{

            transform:
            translateY(-12px);

            box-shadow:
            0 15px 40px rgba(0,0,0,0.5);

        }

        .menu-image{

            position:relative;

            overflow:hidden;

        }

        .menu-image img{

            width:100%;
            height:280px;

            object-fit:cover;

            transition:0.5s;

        }

        .menu-card:hover img{

            transform:scale(1.08);

        }

        .menu-badge{

            position:absolute;

            top:18px;
            left:18px;

            background:
            linear-gradient(45deg,#ff9800,#ff5722);

            padding:8px 18px;

            border-radius:50px;

            font-size:13px;
            font-weight:700;

        }

        .menu-content{

            padding:28px;

        }

        .menu-title{

            font-size:30px;
            font-weight:800;

            margin-bottom:12px;

        }

        .menu-category{

            color:#9e9e9e;

            margin-bottom:20px;
        }

        .menu-description{

            color:#bdbdbd;

            line-height:1.8;

            margin-bottom:25px;

        }

        .menu-footer{

            display:flex;
            justify-content:space-between;
            align-items:center;

        }

        .menu-price{

            font-size:32px;
            font-weight:800;

            color:#ff9800;

        }

        .order-btn{

            border:none;

            background:
            linear-gradient(45deg,#ff9800,#ff5722);

            color:white;

            padding:14px 22px;

            border-radius:18px;

            font-weight:700;

            transition:0.3s;

            text-decoration:none;

        }

        .order-btn:hover{

            transform:translateY(-3px);

            box-shadow:
            0 10px 25px rgba(255,152,0,0.4);

        }

        .stats-section{

            padding:90px 0;

            background:#121212;

            margin-top:100px;

        }

        .stats-card{

            background:#1c1c1c;

            border-radius:25px;

            padding:40px;

            text-align:center;

            transition:0.3s;

            height:100%;

        }

        .stats-card:hover{

            transform:translateY(-8px);

            background:#222;

        }

        .stats-icon{

            width:90px;
            height:90px;

            border-radius:25px;

            background:
            linear-gradient(45deg,#ff9800,#ff5722);

            display:flex;
            justify-content:center;
            align-items:center;

            margin:auto;

            margin-bottom:25px;

            font-size:34px;

        }

        .stats-card h3{

            font-size:42px;
            font-weight:800;

            margin-bottom:10px;

        }

        .stats-card p{

            color:#9e9e9e;
            margin:0;

        }

        @media(max-width:768px){

            .hero-content h1{
                font-size:48px;
            }

            .section-title h2{
                font-size:40px;
            }

            .menu-title{
                font-size:24px;
            }

        }

    </style>

</head>
<body>

<?php include 'navbar.php'; ?>

<!-- HERO -->

<section class="menu-hero">

    <div class="hero-content">

        <h1>
            OUR MENU
        </h1>

        <p>
            Explore premium coffee, signature drinks, and delicious snacks crafted for your perfect digital cafe experience.
        </p>

    </div>

</section>

<!-- MENU SECTION -->

<section class="menu-section">

    <div class="container">

        <div class="section-title">

            <h2>
                Signature Menu
            </h2>

            <p>
                Freshly brewed coffee and premium quality menu.
            </p>

        </div>

        <!-- SEARCH -->

        <div class="search-box">

            <i class="fa fa-search"></i>

            <input type="text" placeholder="Search your favorite menu...">

        </div>

        <!-- FILTER -->

        <div class="filter-container">

            <button class="filter-btn active">
                All Menu
            </button>

            <button class="filter-btn">
                Coffee
            </button>

            <button class="filter-btn">
                Non Coffee
            </button>

            <button class="filter-btn">
                Snack
            </button>

        </div>

        <!-- MENU -->

        <div class="row">

            <?php while($menu = mysqli_fetch_assoc($data)) : ?>

            <div class="col-lg-4 col-md-6 mb-5">

                <div class="menu-card">

                    <div class="menu-image">

                        <img src="<?= $menu['gambar']; ?>">

                        <div class="menu-badge">

                            BEST SELLER

                        </div>

                    </div>

                    <div class="menu-content">

                        <div class="menu-title">

                            <?= $menu['nama']; ?>

                        </div>

                        <div class="menu-category">

                            <i class="fa fa-mug-hot"></i>

                            <?= $menu['kategori']; ?>

                        </div>

                        <div class="menu-description">

                            Premium quality menu with modern cafe taste and aesthetic serving style.

                        </div>

                        <div class="menu-footer">

                            <div class="menu-price">

                                Rp <?= number_format($menu['harga']); ?>

                            </div>

                            <a href="add_to_cart.php?id=<?= $menu['id']; ?>"
                               class="order-btn">

                                <i class="fa fa-cart-shopping"></i>

                                Pesan

                            </a>

                        </div>

                    </div>

                </div>

            </div>

            <?php endwhile; ?>

        </div>

    </div>

</section>

<!-- STATS -->

<section class="stats-section">

    <div class="container">

        <div class="row">

            <div class="col-md-4 mb-4">

                <div class="stats-card">

                    <div class="stats-icon">

                        <i class="fa fa-mug-hot"></i>

                    </div>

                    <h3>120+</h3>

                    <p>Premium Menu</p>

                </div>

            </div>

            <div class="col-md-4 mb-4">

                <div class="stats-card">

                    <div class="stats-icon">

                        <i class="fa fa-users"></i>

                    </div>

                    <h3>5K+</h3>

                    <p>Happy Customers</p>

                </div>

            </div>

            <div class="col-md-4 mb-4">

                <div class="stats-card">

                    <div class="stats-icon">

                        <i class="fa fa-star"></i>

                    </div>

                    <h3>4.9</h3>

                    <p>Customer Rating</p>

                </div>

            </div>

        </div>

    </div>

</section>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>