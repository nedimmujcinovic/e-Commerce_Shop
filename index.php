<?php  require_once 'inc/header.php';
require_once 'app/classes/Product.php';


$products = new Product();
$products = $products->fetch_all();
 ?>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 ">
    <?php foreach ($products as $product): ?>
        <div class="bg-white p-4 shadow-md rounded-lg">
            <img src="images/<?php echo $product['image'] ?>" class="w-full h-40 object-cover mb-2" alt="<?= $product['name'] ?>">
            <div class="card-body">
                <h5 class="text-xl font-semibold"><?= $product['name'] ?></h5>
                <p class="text-gray-600 ">Size: <?= $product['size'] ?></p>
                <p class="text-gray-600 py-2">Price: $<?= $product['price'] ?></p>
                <a href="product.php?product_id=<?= $product['product_id'] ?>" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg">View product</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require_once 'inc/footer.php'; ?>

