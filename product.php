<?php
require_once 'inc/header.php';
require_once 'app/classes/Product.php';
require_once 'app/classes/Cart.php';

$product = new Product();
$product = $product->read($_GET['product_id']);
//  var_dump($product);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $product_id = $product['product_id'];

    $user_id = $_SESSION['user_id'];
    $quantity = $_POST['quantity'];

    $cart = new Cart();
    $cart->add_to_cart($product_id, $user_id, $quantity);
    header("Location: cart.php");
    exit();
}

?>
<div class="flex">
    <div class="w-1/2">
        <img src="<?php echo $product['image']; ?>" class="w-full" alt="Product Image">
    </div>
    <div class="w-1/2 p-4">
        <h2 class="text-xl font-semibold"><?php echo $product['name']; ?></h2>
        <p class="mt-2">Size: <?php echo $product['size']; ?></p>
        <p>Price: $<?php echo $product['price']; ?></p>
        <form action="" method="post" class="mt-4">
            <input type="number" name="quantity">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Add to Cart</button>
        </form>
    </div>
</div>

<?php require_once 'inc/footer.php'; ?>