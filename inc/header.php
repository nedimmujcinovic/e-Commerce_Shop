<?php require_once "app/classes/User.php";
      require_once "app/config/config.php";
    $user = new User();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop</title>
  <!-- Include Tailwind CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="bg-gray-100 p-4">
  <div class="bg-white p-4 shadow-md rounded-lg">
    <div class="container mx-auto flex justify-between items-center ">
      <!-- Left Side: Shop Name and Home Link -->
      <div class="flex items-center ">
        <h1 class="text-xl font-semibold">Shop</h1>
        <a href="index.php" class="ml-4 text-gray-500 hover:underline">Home</a>
      </div>
      <?php if(!$user->is_logged()) : ?>
      <!-- Right Side: Register and Login Links -->
      <div class="flex items-center">
        <a href="register.php" class="mr-4 text-gray-500 hover:underline">Register</a>
        <a href="login.php" class="text-gray-500 hover:underline">Login</a>
      </div>
      <?php else: ?>
        <div class="flex items-center">
        <a href="cart.php" class="mr-4 text-gray-500 hover:coursor">Cart</a>
        <a href="orders.php" class="mr-4 text-gray-500 hover:coursor">My Orders</a>
        <a href="logout.php" class="text-gray-500 hover:underline">Logout</a>
      </div>
    <?php endif; ?>
    </div>
  </div>
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

  </div>
<?php endif; ?>