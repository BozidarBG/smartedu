<?php require('partials/head.php'); ?>

    <h1>Jedan Users</h1>


    <li><?php echo $user->name; ?></li>


    <h1>Change</h1>

    <form method="POST" action="/users/<?php echo $user->id ?>">
        <input name="name" value="<?php echo $user->name?>">
        <button type="submit">Submit</button>
    </form>

<?php require('partials/footer.php'); ?>