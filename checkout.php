<?php  require_once 'inc/header.php';
require_once 'app/classes/Cart.php';
require_once 'app/classes/Order.php';

if(!$user->is_logged()){
    header("Location: login.php");
    exit();
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $delivery_address = $_POST['country'] . ", " . $_POST['city'] . ", " . $_POST['zip'] . ", " . $_POST['address'];
   
    $order = new Order();
    $orders = $order->create($delivery_address);

    $_SESSION['message']['type'] = "success"; // danger or success
    $_SESSION['message']['text'] = "Order created successful!";
    header("Location: orders.php");
    exit();
}
 ?>

<div class="md:w-1/2 mx-auto">
        <h2 class="text-2xl font-semibold mb-4">Orders</h2>
        <form action="" method="POST" enctype="multipart/form-data">
          <label class="block mb-2">Country:</label>
          <input class="w-full border rounded-md px-3 py-2 mb-2" type="text" id="country" name="country" required>
          <label class="block mb-2">City:</label>
          <input class="w-full border rounded-md px-3 py-2 mb-2" type="text" id="city" name="city" required>
          <label class="block mb-2">Post Number:</label>
          <input class="w-full border rounded-md px-3 py-2 mb-2" type="text" id="zip" name="zip" required>
          <label class="block mb-2">Address:</label>
          <input class="w-full border rounded-md px-3 py-2 mb-2" type="text" id="address" name="address" required>
          <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md"
           type="submit" >Order</button>
        </form>
      </div>

<?php require_once 'inc/footer.php';