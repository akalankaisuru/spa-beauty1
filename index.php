<?php include "includes/header.php"; ?>

<style>
.hero {
    background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
    url('uploads/hero1.jpg');
    background-size: cover;
    background-position: center;
    color: white;
    text-align: center;
    padding: 100px 20px;
}

.middle-banner {
    position: relative;
    margin: 50px 0;
}

.middle-banner img {
    width: 100%;
    height: 400px;
    object-fit: cover;
    border-radius: 15px;
}

.banner-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    text-align: center;
    background: rgba(0,0,0,0.4);
    padding: 20px 30px;
    border-radius: 10px;
}

.product-card {
    padding: 20px;
    border-radius: 10px;
    background: #f8f9fa;
    text-align: center;
    transition: 0.3s;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 10px 20px rgba(0,0,0,0.2);
}
</style>

<!-- HERO SECTION -->
<div class="hero">

    <h1>Welcome to Spa Beauty Products</h1>
    <p>Hair Care • Face Care • Body Care • Foot Care</p>

    <a href="store.php" class="btn btn-light">Shop Now</a>

</div>

<!-- ⭐ MIDDLE IMAGE BANNER -->
<div class="container">

    <div class="middle-banner">

        <img src="uploads/spa-banner1.jpg" alt="Beauty Banner">

        <div class="banner-text">
            <h2>Natural Beauty Starts Here</h2>
            <p>Discover premium spa & skincare products for glowing skin</p>
            <a href="store.php" class="btn btn-light">Explore Now</a>
        </div>

    </div>

</div>

<!-- PRODUCT SECTION -->
<style>
.category-wrapper{
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 15px;
    margin-top: 30px;
}

/* BIG BEAUTIFUL BUTTON */
.category-btn {
    padding: 18px 35px;
    font-size: 18px;
    font-weight: 600;
    border-radius: 50px;
    border: 2px solid #000;
    text-decoration: none;
    color: #000;
    background: white;
    transition: all 0.3s ease;
    box-shadow: 0px 5px 15px rgba(0,0,0,0.1);
}

/* HOVER EFFECT */
.category-btn:hover {
    background: black;
    color: white;
    transform: translateY(-5px);
    box-shadow: 0px 10px 25px rgba(0,0,0,0.3);
}

/* MOBILE RESPONSIVE */
@media(max-width: 768px){
    .category-btn{
        width: 100%;
        text-align: center;
    }
}
</style>

<div class="container">
    <div class="category-wrapper">

        <a href="store.php?category=Hair Care" class="category-btn">
            💇 Hair Care
        </a>

        <a href="store.php?category=Face Products" class="category-btn">
            💆 Face Products
        </a>

        <a href="store.php?category=Body Lotion" class="category-btn">
            🧴 Body Lotion
        </a>

        <a href="store.php?category=Foot Products" class="category-btn">
            🦶 Foot Products
        </a>

    </div>
</div>

<?php include "includes/footer.php"; ?>