<?php  require_once 'inc/header.php';
require_once 'app/classes/Cart.php';
require_once 'app/classes/Order.php';


if(!$user->is_logged()){
    header("Location: login.php");
    exit();
}

$order = new Order();

$orders = $order->get_orders();


$twclass = "px-6 text-left text-xs font-small text-gray-500 uppercase tracking-wider";
?>


<div class="bg-white shadow-md rounded-lg overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-100 ">
            <tr>
                <th scope="col" class =<?php $twclass ?> >Order ID</th>
                <th scope="col" class =<?php $twclass ?> >Product Name</th>
                <th scope="col" class =<?php $twclass ?> >Quantity</th>
                <th scope="col" class =<?php $twclass ?> >Price</th>
                <th scope="col" class =<?php $twclass ?> >Size</th>
                <th scope="col" class =<?php $twclass ?> >Image</th>
                <th scope="col" class =<?php $twclass ?> >Delivery Address</th>
                <th scope="col" class =<?php $twclass ?> >Order Date</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            <?php foreach($orders as $order): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-1 whitespace-nowrap text-center"><?php echo $order['order_id']; ?></td>
                    <td class="px-4 py-1 whitespace-nowrap text-center"><?php echo $order['name']; ?></td>
                    <td class="px-4 py-1 whitespace-nowrap text-center"><?php echo $order['quantity']; ?></td>
                    <td class="px-4 py-1 whitespace-nowrap text-center">$<?php echo $order['price']; ?></td>
                    <td class="px-4 py-1 whitespace-nowrap text-center"><?php echo $order['size']; ?></td>
                    <td class="px-4 py-1 whitespace-nowrap text-center"><img src="<?php echo $order['image']; ?>" class="h-12"></td>
                    <td class="px-4 py-1 whitespace-nowrap text-center"><?php echo $order['delivery_address']; ?></td>
                    <td class="px-4 py-1 whitespace-nowrap text-center"><?php echo $order['created_at']; ?></td>
        
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php require_once 'inc/footer.php';