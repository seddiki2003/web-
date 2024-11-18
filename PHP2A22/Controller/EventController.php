<?php

require_once '../config.php';
require_once '../Model/event.php';

class EventController
{
    public function listEvents()
    {
        $db = config::getConnexion();
        try {
            $query = $db->query('SELECT * FROM evenement');
            return $query;
        } catch (Exception $e) {
            error_log($e->getMessage()); // Log error instead of showing it to the user
            return null;
        }
    }

    public function addEvent($event)
    {
        $db = config::getConnexion();
        try {
            $query = $db->prepare('
                INSERT INTO evenement (nom_event, discript_event, date_event) VALUES (:nomevent, :description, :date)
            ');
            $query->execute([
                'nomevent' => $event->getNom(),
                'description' => $event->getDescription(),
                'date' => $event->getDate()
            ]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
        return true;
    }

    public function deleteEvent($id)
    {
        $db = Config::getConnexion();
        try {
            $query = $db->prepare('
                DELETE FROM evenement WHERE id_event = :id
            ');
            $query->execute(['id' => $id]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
        return true;
    }

    public function updateEvent($id, $event)
    {
        $db = Config::getConnexion();
        try {
            $query = $db->prepare('
                UPDATE evenement SET nom_event = :n, discript_event = :d, date_event = :date WHERE id_event = :id
            ');
            $query->execute([
                'id' => $id,
                'n' => $event->getNom(),
                'd' => $event->getDescription(),
                'date' => $event->getDate()
            ]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
        return true;
    }
}
