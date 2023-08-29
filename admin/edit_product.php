<?php 
require_once '../app/classes/User.php';
require_once '../app/classes/Product.php';


$user = new User();

if($user-> is_logged() && $user->is_admin()): 

    $product_obj = new Product();
    $product = $product_obj->read($_GET['id']);

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $product_id = $_GET['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $size = $_POST['size'];
        $image = $_POST['image'];

        $product_obj->update($name, $price, $size, $image, $product_id);
        if($product_obj) {
            $_SESSION['message']['type'] = "success"; // danger or success
            $_SESSION['message']['text'] = "Edit succeessful!";
            
          
        header("Location: edit_product.php?id=".$product_id);
        exit();
        }
    }
endif;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Edit Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
<div class="container mx-auto py-6 rounded-lg">

    <?php if (isset($_SESSION['message'])) : ?>
      <?php
      $messageTypeClass = 'bg-green-300'; // Default class

      if ($_SESSION['message']['type'] === 'danger') {
        $messageTypeClass = 'bg-red-500'; // Change class for danger type
      }
      ?>
<div class="<?php echo $messageTypeClass; ?> p-4 text-white text-center rounded-lg" <?php echo $_SESSION['message']['type']; ?>>
        <p class="text-lg font-semibold">
          <?php
          echo $_SESSION['message']['text'];
          unset($_SESSION['message']);
          ?>
        </p>
      </div>
      <?php endif; ?>


<div class="max-w-md mx-auto my-8 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-semibold mb-4">Edit product information</h1>
    <form action="" method="post">
               <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Product Name:</label>
            <input type="text" name="name" class="mt-1 p-2 border rounded w-full" value="<?php echo $product['name']; ?>" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Product Price:</label>
            <input type="text" name="price" class="mt-1 p-2 border rounded w-full" value="<?php echo $product['price']; ?>" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Product Size:</label>
            <input type="text" name="size" class="mt-1 p-2 border rounded w-full" value="<?php echo $product['size']; ?>" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Product Image:</label>
            <input type="text" name="image" class="mt-1 p-2 border rounded w-full" value="<?php echo $product['image']; ?>" required>
            
        </div>
        <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md"
           type="submit" >Edit</button>
    </form>
</div>
</body>
</html>
