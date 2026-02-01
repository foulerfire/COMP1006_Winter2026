<?php //start file for lab3   ?>

<main>
    <h2> Bake It Till You Make It - Contact Form     </h2>
    
    <form action = "processForm.php" method="post">
    <fieldset>
        <!-- client input with client side validation with html -->
        <legend> List test </legend>
        <label for="first_name">First name</label> 
        <input type="text" id="first_name" name="first_name" required>
        <label for="last_name">Last name</label> 
        <input type="text" id="last_name" name="last_name" required>
        
        <br> <label for="email">Email</label> </br>
        <input type="email" id="email" name="email" required>
        <!-- message input box, not a required to be filled out -->
        <p>
            <label for="message">Message</label><br>
            <textarea id="message" name="message" rows="4"
            placeholder="Please type your message here" required></textarea>
        </p>
        </fieldset>
        <!--- button to send message -->
        <p>
        <button type="submit">Send Message</button>
        </p>
</form>
</main>

