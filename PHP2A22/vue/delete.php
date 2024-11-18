<?php

require_once '../Controller/EventController.php'; // Ensure this is the correct path to EventController.php
require_once '../Model/event.php'; // Ensure this is the correct path to Event.php

$eventController = new EventController();

$eventController -> deleteEvent($_GET["id"]);

header('Location:liste.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete</title>
</head>
<body>
    <form action="" method="GET">
        <input type="number" name="id" placeholder="Enter id event " required>
        <input type="submit" value="Save">
    </form>
    
</body>
</html>