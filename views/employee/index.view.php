<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>


<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        
    <?php foreach ($users as $employee): ?>
            <div class="flex justify-between items-center border-b py-2">
                <div>
                    <a href='/emp?user_id=<?= $employee['id'] ?>' class='text-blue-600 font-medium hover:underline'>
                        <?= htmlspecialchars($employee['name']) ?>
                    </a>
                </div>
                <div class="flex space-x-4">
                    <!-- Edit Button -->
                    <a href="/employee/edit?id=<?= $employee['id'] ?>" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-sm">
                        Edit
                    </a>

                    <!-- Delete Form -->
                    <form method="POST" action="/employee/delete" onsubmit="return confirm('Are you sure you want to delete this user?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="<?= $employee['id'] ?>">
                        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
        
        </br>
        <p>
            <a href="/employee/create" class="text-blue-500 hover:underline">Create New Employee</a>
        </p>
        
       
        

</main>

<?php require base_path("views/partials/footer.php"); ?>