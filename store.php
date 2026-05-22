<?php
include "includes/header.php";
include "includes/db.php";
?>

<style>
/* FULL BACKGROUND IMAGE */
body {
    background: url('uploads/store-bg.jpg') no-repeat center center fixed;
    background-size: cover;
}

/* DARK OVERLAY */
body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.45);
    z-index: -1;
}

/* STORE CONTAINER (GLASS EFFECT) */


/* PAGE TITLE */
.store-title {
    text-align: center;
    font-weight: bold;
    margin-bottom: 20px;
}

/* PRODUCT CARD */
.product-card {
    background: white;
    padding: 15px;
    border-radius: 12px;
    text-align: center;
    margin-bottom: 20px;
    transition: 0.3s;
    box-shadow: 0px 5px 15px rgba(0,0,0,0.1);
}

.product-card:hover {
    transform: translateY(-5px);
}

.product-card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 10px;
}
</style>

<div class="container mt-4 store-container">

<h2 class="store-title">🛍️ Our Products</h2>

<?php
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : "";

/* SINGLE CATEGORY */
if($selectedCategory != "") {

    $selectedCategory = $conn->real_escape_string($selectedCategory);

    $result = $conn->query("SELECT * FROM products WHERE category='$selectedCategory'");

    echo "<h4 class='text-center text-primary mb-3'>$selectedCategory</h4>";

    echo '<div class="row">';

    while($row = $result->fetch_assoc()) {
        ?>

        <div class="col-md-3">

            <div class="product-card">

                <img src="uploads/<?= $row['image'] ?>">

                <h5 class="mt-2"><?= $row['name'] ?></h5>

                <p><?= $row['category'] ?></p>

                <p><b>Rs <?= $row['price'] ?></b></p>

                <p>
                    <?= $row['stock'] > 0 ? "Available" : "Out of Stock" ?>
                </p>

                <a href="add_to_cart.php?id=<?= $row['id'] ?>" class="btn btn-dark btn-sm">
                    Add To Cart
                </a>

            </div>

        </div>

        <?php
    }

    echo '</div>';

} else {

    /* ALL CATEGORIES */
    $categories = [
        "Hair Care",
        "Face Products",
        "Body Lotion",
        "Foot Products"
    ];

    foreach($categories as $cat) {

        $result = $conn->query("SELECT * FROM products WHERE category='$cat'");
        ?>

        <h4 class="mt-4 text-white"><?= $cat ?></h4>

        <div class="row">

        <?php while($row = $result->fetch_assoc()) { ?>

        <div class="col-md-3">

            <div class="product-card">

                <img src="uploads/<?= $row['image'] ?>">

                <h5 class="mt-2"><?= $row['name'] ?></h5>

                <p><?= $row['category'] ?></p>

                <p><b>Rs <?= $row['price'] ?></b></p>

                <p>
                    <?= $row['stock'] > 0 ? "Available" : "Out of Stock" ?>
                </p>

                <a href="add_to_cart.php?id=<?= $row['id'] ?>" class="btn btn-dark btn-sm">
                    Add To Cart
                </a>

            </div>

        </div>

        <?php } ?>

        </div>

        <?php
    }
}
?>

</div>

<?php include "includes/footer.php"; ?>