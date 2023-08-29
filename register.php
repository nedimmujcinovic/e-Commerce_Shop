<?php 
require_once "inc/header.php";

if($user->is_logged()){
  header("Location: index.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  

  $created = $user->create($name, $username, $email, $password);

  if($created) {
    $_SESSION['message']['type'] = "success"; // danger or success
    $_SESSION['message']['text'] = "Registration account succeessful!";
    header("Location: login.php");
    exit();
  }
  else {
    $_SESSION['message']['type'] = "danger"; // danger or success
    $_SESSION['message']['text'] = "Account registration unsucceessful!";
    header("Location: register.php");
    exit();
  }
}
?>
<div class="flex flex-col mb-5">
      <div class="md:w-1/2 mx-auto">
        <h2 class="text-2xl font-semibold mb-4">Registration</h2>
        <form action="" method="POST" enctype="multipart/form-data" id="registrationForm">
          <label class="block mb-2">Full Name:</label>
          <input class="w-full border rounded px-3 py-2 mb-2" type="text" id="name" name="name" required>
          <label class="block mb-2">User Name:</label>
          <input class="w-full border rounded px-3 py-2 mb-2" type="text" id="username" name="username" required>
          <label class="block mb-2">Email:</label>
          <input class="w-full border rounded px-3 py-2 mb-2" type="email" id="email" name="email" required>
          <label class="block mb-2">Password:</label>
          <input class="w-full border rounded px-3 py-2 mb-2" type="password" id="password" name="password" required>

          <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded"
           type="submit" value="Register Member">Register</button>
        
        </form>
      </div>
   <?php require_once "inc/footer.php"; ?>