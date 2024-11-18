<?php
require_once '../Controller/EventController.php'; // Ensure this is the correct path to EventController.php

$eventController = new EventController();
$liste = $eventController->listEvents();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Événements</title>
</head>

<body>
    <h1>Liste des Événements</h1>

    <?php if (empty($liste)): ?>
        <p>Aucun événement trouvé.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($liste as $event): ?>
                <li>
                    <?= htmlspecialchars($event['id_event']); ?> - 
                    <?= htmlspecialchars($event['nom_event']); ?> - 
                    <?= htmlspecialchars($event['discript_event']); ?> 
                    <a href="delete.php?id=<?= htmlspecialchars($event['id_event']); ?>">Delete</a>
                    <form action="update.php" method="GET">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($event['id_event']); ?>">
                        <input type="submit" value="Update">
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

</body>

</html>