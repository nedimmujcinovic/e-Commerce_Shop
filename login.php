<?php require_once "inc/header.php";
require_once "app/classes/User.php"; 

if($user->is_logged()){
    header("Location: index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    $result = $user->login($username, $password);

    if (!$result) {
        $_SESSION['message']['type'] = "danger"; // danger or success
        $_SESSION['message']['text'] = "Incorrect username or password!";
        header("Location: login.php");
        exit();
    } 
    else { 
    header("Location: index.php");
    exit(); }
}

?>

<div class="flex flex-col mb-5">
    <div class="md:w-1/2 mx-auto">
        <h2 class="text-2xl font-semibold mb-4">Login</h2>
        <form action="" method="POST" enctype="multipart/form-data" id="registrationForm">

            <label class="block mb-2">User Name:</label>
            <input class="w-full border rounded px-3 py-2 mb-2" type="text" id="username" name="username" required>
            <label class="block mb-2">Password:</label>
            <input class="w-full border rounded px-3 py-2 mb-2" type="password" id="password" name="password" required>

            <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded" type="submit" value="Register Member">Login</button>

        </form>
    </div>

    <?php require_once "inc/footer.php"; ?>