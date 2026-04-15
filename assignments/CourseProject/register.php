<!DOCTYPE html>
<html lang="en">
<?php require "includes/header.php"; ?>

<main class="container mt-4">
    <h1>Register</h1>

    <form action="register_process.php" method="post" class="mt-3">
        <label class="form-label" for="email">Email</label>
        <input class="form-control" type="email" id="email" name="email">

        <label class="form-label mt-3" for="password">Password</label>
        <input class="form-control" type="password" id="password" name="password">

        <label class="form-label mt-3" for="confirm_password">Confirm Password</label>
        <input class="form-control" type="password" id="confirm_password" ame="confirm_password">

        <button class="btn btn-primary mt-4" type="submit">Register</button>
    </form>

    <p class="mt-3">
        <a href="login.php">Already have an account? Log in here</a>
    </p>
</main>

<?php require "includes/footer.php"; ?>