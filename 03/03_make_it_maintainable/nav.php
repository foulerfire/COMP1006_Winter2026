<?php
$navItems = ["Home", "About", "Contact"];
?>

<ul>
<?php foreach ($navItems as $item): ?>
    <li><?= htmlspecialchars($item) ?></li>
<?php endforeach; ?>
</ul>
