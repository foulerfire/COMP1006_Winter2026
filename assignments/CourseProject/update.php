<?php
// update player information in database using player id

// site header
require "includes/header.php";

// database connection
require "includes/connect.php";

// make sure an id was passed in the url
if (!isset($_GET['id'])) {
    die("No player ID provided.");
}

$playerId = $_GET['id'];

// if form is submitted, update the player
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // sanitize user input
    $firstName = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $lastName  = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $position  = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_SPECIAL_CHARS);
    $email     = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone     = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
    $team      = filter_input(INPUT_POST, 'team', FILTER_SANITIZE_SPECIAL_CHARS);

    // validation
    if ( $firstName === '' || $firstName === null || $lastName === ''  || $lastName === null  || !filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        $error = "First name, last name, and a valid email are required.";
    } else {
        // sql update statement
        $sql = "
        UPDATE players
        SET first_name = :first,
            last_name = :last,
            position = :position,
            email = :email,
            phone = :phone,
            team_name = :team
        WHERE player_id = :id
        ";

        $stmt = $pdo->prepare($sql);

        // bind values to placeholders
        $stmt->bindValue(':first', $firstName);
        $stmt->bindValue(':last', $lastName);
        $stmt->bindValue(':position', $position);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':phone', $phone);
        $stmt->bindValue(':team', $team);
        $stmt->bindValue(':id', $playerId, PDO::PARAM_INT);

        $stmt->execute();

        // redirect back to players list
        header("Location: players.php");
        exit;
    }
}

// load existing player data to pre-fill the form
$sql = "SELECT * FROM players WHERE player_id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $playerId, PDO::PARAM_INT);
$stmt->execute();

$player = $stmt->fetch();

if (!$player) {
    die("Player not found.");
}
?>

<main class="container mt-4">
    <h2>Update Player #<?= (int)$player['player_id']; ?></h2>

    <?php if (!empty($error)): ?>
        <p class="text-danger"><?= htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <!-- form pre-filled with player data from database -->
    <form method="post">

        <label class="form-label">First Name</label>
        <input
            type="text"
            name="first_name"
            class="form-control mb-3"
            value="<?= htmlspecialchars($player['first_name']); ?>"
            required
        >

        <label class="form-label">Last Name</label>
        <input
            type="text"
            name="last_name"
            class="form-control mb-3"
            value="<?= htmlspecialchars($player['last_name']); ?>"
            required
        >

        <label class="form-label">Position</label>
        <input
            type="text"
            name="position"
            class="form-control mb-3"
            value="<?= htmlspecialchars($player['position']); ?>"
            required
        >

        <label class="form-label">Email</label>
        <input
            type="email"
            name="email"
            class="form-control mb-3"
            value="<?= htmlspecialchars($player['email']); ?>"
            required
        >

        <label class="form-label">Phone</label>
        <input
            type="text"
            name="phone"
            class="form-control mb-3"
            value="<?= htmlspecialchars($player['phone']); ?>"
        >

        <label class="form-label">Team Name</label>
        <input
            type="text"
            name="team"
            class="form-control mb-4"
            value="<?= htmlspecialchars($player['team_name']); ?>"
            required
        >

        <button class="btn btn-primary">Save Changes</button>
        <a href="players.php" class="btn btn-secondary">Cancel</a>
    </form>
</main>

<?php
// site footer
require "includes/footer.php";
?>