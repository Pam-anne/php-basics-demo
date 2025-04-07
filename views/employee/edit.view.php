<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>

<main class="h-full flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold text-center text-gray-900 mb-6">Edit Employee</h2>
        <form method="POST" action="/employee">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="id" value="<?= $users['id'] ?>">

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">Name</label>
                <input type="text" id="name" name="name"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" value="<?= htmlspecialchars($users['name']) ?>">

                <?php if (isset($errors['name'])): ?>
                    <p class="text-red-500 text-xs mt-2"><?= $errors['name'] ?></p>
                <?php endif; ?>

                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" id="email" name="email"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" value="<?= htmlspecialchars($users['email']) ?>">



                <?php if (isset($errors['email'])): ?>
                    <p class="text-red-500 text-xs mt-2"><?= $errors['email'] ?></p>
                <?php endif; ?>

            </div>
            <div class="flex space-x-4 mt-4">
                <a href="/employee"
                    class="flex-1 text-center bg-gray-300 text-gray-800 py-2 rounded-lg hover:bg-gray-400 transition">
                    Cancel
                </a>

                <button type="submit"
                    class="flex-1 bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">
                    Update
                </button>
            </div>

        </form>

    </div>
</main>

<?php require base_path("views/partials/footer.php"); ?>