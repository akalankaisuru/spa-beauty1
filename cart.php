<?php
include "includes/header.php";
include "includes/db.php";

$user_id = $_SESSION['user'];

$result = $conn->query("
SELECT cart.id as cart_id,
products.name,
products.price,
cart.qty
FROM cart
JOIN products ON cart.product_id = products.id
WHERE cart.user_id='$user_id'
");

$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .cart-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 5px 20px rgba(0,0,0,0.1);
        }

        .checkout-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 5px 20px rgba(0,0,0,0.1);
            position: sticky;
            top: 20px;
        }

        .btn-checkout {
            width: 100%;
            background: #00b894;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 8px;
        }

        .btn-checkout:hover {
            background: #00a383;
        }

        .qty-btn {
            padding: 3px 10px;
            background: #ddd;
            border-radius: 5px;
            text-decoration: none;
            margin: 2px;
        }

        .remove-btn {
            color: red;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container mt-5">

<div class="row">

<!-- CART TABLE -->
<div class="col-md-8">

<div class="cart-box">

<h3>Your Cart 🛒</h3>

<table class="table">

<tr>
<th>Product</th>
<th>Price</th>
<th>Qty</th>
<th>Total</th>
<th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()) {

$sub = $row['price'] * $row['qty'];
$total += $sub;

?>

<tr>

<td><?= $row['name'] ?></td>

<td>Rs <?= $row['price'] ?></td>

<td>
<a class="qty-btn" href="update_cart.php?id=<?= $row['cart_id'] ?>&type=minus">-</a>
<?= $row['qty'] ?>
<a class="qty-btn" href="update_cart.php?id=<?= $row['cart_id'] ?>&type=plus">+</a>
</td>

<td>Rs <?= $sub ?></td>

<td>
<a class="remove-btn" href="remove_from_cart.php?id=<?= $row['cart_id'] ?>">Remove</a>
</td>

</tr>

<?php } ?>

</table>

</div>

</div>

<!-- CHECKOUT BOX -->
<div class="col-md-4">

<div class="checkout-box">

<h4>Checkout</h4>

<hr>

<p><b>Subtotal:</b> Rs <?= $total ?></p>
<p><b>Delivery:</b> Free</p>

<hr>

<h5>Total: Rs <?= $total ?></h5>

<!-- PAYMENT OPTIONS -->
<form method="POST" action="place_order.php">

<h6 class="mt-3">Payment Method</h6>

<div class="form-check">
  <input class="form-check-input" type="radio" name="payment" value="cash" checked>
  <label class="form-check-label">Cash on Delivery</label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="payment" value="card">
  <label class="form-check-label">Card Payment</label>
</div>

<input type="hidden" name="total" value="<?= $total ?>">

<button class="btn btn-checkout mt-3">Place Order</button>

</form>

</div>

</div>

</div>

</div>

</body>
</html>

<?php include "includes/footer.php"; ?>