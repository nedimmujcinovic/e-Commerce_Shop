<?php 
require_once '../app/classes/User.php';
require_once '../app/classes/Product.php';


$user = new User();

if($user-> is_logged() && $user->is_admin()): 


endif; 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="bg-gray-100">
<div class="container mx-auto py-6 rounded-lg">

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
           type="submit" >Add Product</button>
    </form>
</div>
</div>
</body>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
            <script>

              Dropzone.options.dropzoneUpload = {
                url: "upload_photo.php",
                paramName: "photo",
                MaxFileSize: 20, //MB
                acceptedFiles: "image/*",
                init: function (){
                  this.on("success", function(file, response){
                    // Parse the JSON respone
                    const jsonResponse = JSON.parse(response);
                    //Check if the file was uploaded successfully
                    if (jsonResponse.success) {
                      // Ser the hidden input's value to the uploaded file's path
                      document.getElementById('photoPathInput').value = jsonResponse.photo_path;

                    } else {
                      console.error(jsonResponse.error);
                    }
                  });
                }
              };
            </script>
</html>
