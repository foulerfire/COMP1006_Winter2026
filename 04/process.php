<?php
require "includes/header.php";

/* 
// access the form data and then eecho on the page in a confirmation message
$firstname = $_POST['first_name'];
$lastname = $_POST['last_name'];
$address = $_POST['address'];
$email = $_POST['email'];
$items = $_POST['items'];
WARNING THIS HAS NO SERVER SIDE VALIDATION
*/


/* a better way
santize the data - filter_input and validate - filter_var (proper emial format, proper phone number format, 
integer for order quantity) and logic to ensure users provide requrie info
*/

//grab the data, clean and store in a variable
$firstName = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
$lastName  = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

$items = $_POST['items'] ?? []; //create empty list if items dont exist

//validate serverside
$errors = [];

//require text fields
//first name validation
if ($firstName === null || $firstName === ''){
    $errors[] = "First name is required";
}
//last name validation
if ($lastName === null || $lastName === ''){
    $errors[] = "Last name is required";
}
//email validation
if ($email=== null || $email === ''){
    $errors[] = "email is required";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "You must enter a valid email";
}

//address validation
if ($address === null || $address === ''){
    $errors[] = "address is required";
}

$itemsOrdered = [];
//check that item order quantity is a number
foreach($items as $item => $quantity){
    if(filter_var($quantity, FILTER_VALIDATE_INT) !==false && $quantity > 0){
        $itemsOrdered[$item] = $quantity;
    }
}

if(count($itemsOrdered) === 0){
    $errors[] = "Please order at least one item";
}


//loop throuhg error messages
if(!empty($errors)){
    foreach ($errors as $error) : ?>
    <li> <?php echo $error; ?> </li>
    <?php endforeach; 
    //stop the script from executing
    exit;
}
?>

<main>
   <?php echo "<h2> Thanks for your order " . $firstName . "</h2>"; ?>
    <h3> Items Ordered </h3>
    <ul>
    <?php foreach($items as $item => $quantity): ?>
    <li><?php echo $item ?> - <?php echo $quantity ?> </li>
    <?php endforeach; ?>
    </ul>   

</main>
<?php mail($to, $subject, $message); ?>
<?php require "includes/footer.php"; ?> 