<?php
require_once '../Controller/EventController.php'; // Ensure this is the correct path to EventController.php
require_once '../Model/event.php';

$eventController = new EventController();

if (isset($_POST['Save'])) {
    // Create a new Event object with the provided data
    $event = new Event($_POST['nom'], $_POST['description'], $_POST['date']);
    
    // Set the ID for the event to be updated
    $event->setId($_POST['id']);

    // Update the event in the database
    $eventController->updateEvent($_POST['id'], $event);

    // Redirect to the list page
    header('Location: liste.php?message=Event updated successfully');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Event</title>
</head>
<body>
    <h1>Update Event</h1>

    <?php
    if (isset($_GET['id'])) {
        // Fetch the event data using the event ID
        $event = $eventController->getId($_GET['id']);

        if ($event) { // Check if the event was found
            ?>
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($event->getId()); ?>">
                <label for="nom">Nom:</label>
                <input type="text" name="nom" value="<?php echo htmlspecialchars($event->getNom()); ?>" required>
                <br>
                <label for="description">Description:</label>
                <input type="text" name="description" value="<?php echo htmlspecialchars($event->getDescription()); ?>" required>
                <br>
                <label for="date">Date:</label>
                <input type="date" name="date" value="<?php echo htmlspecialchars($event->getDate()->format('Y-m-d')); ?>" required>
                <br>
                <input type="submit" value="Save" name="Save">
            </form>
            <?php
        } else {
            echo "<p>Event not found.</p>";
        }
    } else {
        echo "<p>No event ID provided.</p>";
    }
    ?>
</body>
</html>