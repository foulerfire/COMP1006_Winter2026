<!DOCTYPE html>
<html lang="en">
<?php
    require "includes/header.php";
?>
<link href="styles/main.css" rel="stylesheet">

<body>
    <main class="container mt-4">
        
        <!-- Form input for player information -->
        <h1>Please Enter Your Player Information Here</h1>

        <form action="process.php" method="post" class="mt-3">
            <label class="form-label" for="first_name">First Name</label>
            <input class="form-control" type="text" id="first_name" name="first_name">

            <label class="form-label mt-3" for="last_name">Last Name</label>
            <input class="form-control" type="text" id="last_name" name="last_name">

            <label class="form-label mt-3" for="position">Position</label>
            <input class="form-control" type="text" id="position" name="position">


            <label class="form-label mt-3" for="email">Email Address</label>
            <input class="form-control" type="email" id="email" name="email">

           
            <label for="phone" class="form-label mt-3">Phone number</label>
            <input type="tel" id="phone" name="phone" placeholder="555-123-4567" class="form-control">

            <label class="form-label mt-3" for="team">Team Name</label>
            <input class="form-control" type="text" id="team" name="team">

            <button class="btn btn-primary mt-4" type="submit">Submit</button>
        </form>

        <p class="mt-4">
            <a href="subscribers.php">View Subscribers</a>
        </p>
    </main>
</body>

</html>