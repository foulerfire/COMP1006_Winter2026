<?php   ?>

//start file for lab3
<main>
    <h2> Hello this is a test </h2>
    
    <form action = "processForm.php" method="post">
    <fieldset>
        <!--- client side validation with html -->
        <legend> List test </legend>
        <label for="first_name">First name</label>
        <input type="text" id="first_name" name="first_name">
        <label for="last_name">Last name</label>
        <input type="text" id="last_name" name="last_name">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" >

        <p>
            <label for="message">Message</label><br>
            <textarea id="message" name="message" rows="4"
            placeholder="Allergies, delivery instructions, custom messages..."></textarea>
        </p>
        </fieldset>

        <p>
        <button type="submit">Place Order</button>
        </p>
</form>
</main>

