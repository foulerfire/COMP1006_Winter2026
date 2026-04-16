

 <?php
// displays list of all team members stored in database. Each player can be updated or deleted using the buttons
// site header and authentication
require "includes/auth.php";
require "includes/header_admin.php";
require "includes/connect.php";

$userId = $_SESSION['user_id'];
// sql query to retrieve all players from databas
$sql = "SELECT * FROM players WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
$stmt->execute();
// fetch rows from the result as array
$players = $stmt->fetchAll();
?>

<main class="mt-4 container">
  <h2>Team Members</h2>

    <!-- if no players exist in database, display a message -->
  <?php if (empty($players)): ?>
    <p>No players have been added yet.</p>
  <?php else: ?>

    <!-- responsive table that scrolls on small screens -->
    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Position</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Team</th>
            <th>Photo</th>
          </tr>
        </thead>

        <tbody>
          <?php
          
           // loop through each player returned from the database and output table row for each one
          ?>
          <?php foreach ($players as $player): ?>
            <tr>
              <!-- player's ID cast to integer for just in case -->
              <td><?= (int)$player['player_id']; ?></td>

              <td>
                <?= htmlspecialchars($player['first_name']); ?>
                <?= htmlspecialchars($player['last_name']); ?>
              </td>

              <td><?= htmlspecialchars($player['position']); ?></td>
              <td><?= htmlspecialchars($player['email']); ?></td>
              <td><?= htmlspecialchars($player['phone']); ?></td>
              <td><?= htmlspecialchars($player['team_name']); ?></td>
              <!-- output player photo -->
              <td>
                  <?php if (!empty($player['player_photo'])): ?>
                      <img src="uploads/<?= htmlspecialchars($player['player_photo']); ?>" width="100">
                  <?php else: ?>
                      No Photo
                  <?php endif; ?>
              </td>
              
              <td>
                <!-- update button sends player to update.php through URL -->
                <a
                  class="btn btn-sm btn-warning"
                  href="update.php?id=<?= urlencode($player['player_id']); ?>">
                  Update
                </a>

                <!-- delete button sends player ID to delete.php with confirmation message -->
                <a
                  class="btn btn-sm btn-danger mt-2"
                  href="delete.php?id=<?= urlencode($player['player_id']); ?>"
                  onclick="return confirm('Are you sure you want to delete this player?');">
                  Delete
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  <?php endif; ?>

  <!-- link back to form to add new player -->
  <a class="btn btn-secondary" href="add_player.php">Add New Player</a>
</main>

<?php
require "includes/footer.php";
?>