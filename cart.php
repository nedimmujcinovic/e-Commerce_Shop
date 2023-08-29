<?php  require_once 'inc/header.php';
require_once 'app/classes/Cart.php';

if(!$user->is_logged()){
    header("Location: login.php");
    exit();
}

$cart = new Cart();
$cart_items = $cart->get_cart_items();



 ?>
<div class="bg-white shadow-md rounded-lg overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Name</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Size</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            <?php foreach($cart_items as $item): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-1 whitespace-nowrap"><?php echo $item['name']; ?></td>
                    <td class="px-6 py-1 whitespace-nowrap"><?php echo $item['size']; ?></td>
                    <td class="px-6 py-1 whitespace-nowrap">$<?php echo $item['price']; ?></td>
                    <td class="px-6 py-1 whitespace-nowrap"><?php echo $item['quantity']; ?></td>
                    <td class="px-6 py-1 whitespace-nowrap"><img src="<?php echo $item['image']; ?>" class="h-12"></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<a href="checkout.php" class="mt-4 inline-block px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg">Checkout</a>

<?php require_once 'inc/footer.php';