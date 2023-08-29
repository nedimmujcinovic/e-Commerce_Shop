<?php 
require_once '../app/classes/User.php';
require_once '../app/classes/Product.php';


$user = new User();

if($user-> is_logged() && $user->is_admin()): 


    $product = new Product();
    $products = $product->fetch_all();
?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <!-- Include Tailwind CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="bg-gray-100 p-4">
    

    <div class="bg-white shadow-md rounded-lg overflow-hidden p-4">
    <a href="add_product.php" button class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded"> Add Product </a>
    
    <table class="min-w-full divide-y divide-gray-200 ">
        <thead class="bg-gray-100 ">
            <tr>
                <th scope="col" class =<?php $twclass ?> >Order ID</th>
                <th scope="col" class =<?php $twclass ?> >Product Name</th>
                <th scope="col" class =<?php $twclass ?> >Price</th>
                <th scope="col" class =<?php $twclass ?> >Size</th>
                <th scope="col" class =<?php $twclass ?> >Image</th>
                
                <th scope="col" class =<?php $twclass ?> >Created At</th>
                <th scope="col" class =<?php $twclass ?> >Activities</th>

            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            <?php foreach($products as $product): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-1 whitespace-nowrap text-center"><?php echo $product['product_id']; ?></td>
                    <td class="px-4 py-1 whitespace-nowrap text-center"><?php echo $product['name']; ?></td>
                   
                    <td class="px-4 py-1 whitespace-nowrap text-center">$<?php echo $product['price']; ?></td>
                    <td class="px-4 py-1 whitespace-nowrap text-center"><?php echo $product['size']; ?></td>
                    <td class="px-4 py-1 whitespace-nowrap text-center"><img src="<?php echo $product['image']; ?>" class="h-12"></td>
                    
                    <td class="px-4 py-1 whitespace-nowrap text-center"><?php echo $product['created_at']; ?></td>
                    <td class="px-4 py-1 whitespace-nowrap text-center">
                        <a href="edit_product.php?id=<?php echo $product['product_id']; ?> "class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded" >Edit</a>
                        <a href="delete_product.php?id=<?php echo $product['product_id']; ?>"class="bg-purple-500 hover:bg-purple-600 text-white py-2 px-4 rounded">Delete</a>
                    </td>
        
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


</body>

<?php endif ?> 