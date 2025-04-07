<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>

  <main class="h-full flex items-center justify-center">
  <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold text-center text-gray-900 mb-6">Create Employee</h2>
        <form method="POST" action="/employee">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">Name</label>
                <input type="text" id="name" name="name" 
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                
                
                <?php if(isset($errors['name'])):?>
                    <p class="text-red-500 text-xs mt-2"><?= $errors['name']?></p>
                <?php endif;?>
                
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" id="email" name="email"  
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            
                

                <?php if(isset($errors['email'])):?>
                    <p class="text-red-500 text-xs mt-2"><?= $errors['email']?></p>
                <?php endif;?>
            
            </div>

            <button type="submit" 
                class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">Create</button>
        </form>
       
    </div>
  </main>

  <?php require base_path("views/partials/footer.php"); ?>