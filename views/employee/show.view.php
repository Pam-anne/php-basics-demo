<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>


<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p>
            <a href="/employee" class="text-blue-500 hover:underline">Go back..</a>
        </p></br>
        <!-- when using fetch() at note.php you should not loop since it returns an arra row and not associative array -->
       

            <li>
                <?= htmlspecialchars($note['cname'])?>
            </li>

            <li>
                <?= htmlspecialchars($note['department'])?>
            </li>
            <li>
                <?= htmlspecialchars($note['role'])?>
            </li>
            <li>
                <?= htmlspecialchars($note['location'])?>
            </li>

       
        <form class="mt-6" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="user_id" value="<?=$note['user_id']?>">
            <button class="text-sm text-red-500">Delete</button>
        </form>
    </div>


</main>


<?php require base_path("views/partials/footer.php"); ?>