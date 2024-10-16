<?php
class TechnicianDB {

    public static function getTechnicians() {
        $db = Database::getDB();
        $query = 'SELECT * FROM technicians';
        $statement = $db->prepare($query);
        $statement->execute();

        $technicians = array();
        foreach ($statement as $row) {
            $technician = new Technician(
                $row['techID'],
                $row['firstName'],
                $row['lastName'],
                $row['email'],
                $row['phone']
            );
            $technicians[] = $technician;
        }
        $statement->closeCursor();
        return $technicians;
    }


    public static function deleteTechnician($techID) {
        $db = Database::getDB();
        $query = 'DELETE FROM technicians WHERE techID = :techID';
        $statement = $db->prepare($query);
        $statement->bindValue(':techID', $techID);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function addTechnician($technician) {
        $db = Database::getDB();
        $query = 'INSERT INTO technicians (firstName, lastName, email, phone)
                  VALUES (:firstName, :lastName, :email, :phone)';
        $statement = $db->prepare($query);
        $statement->bindValue(':firstName', $technician->getFirstName());
        $statement->bindValue(':lastName', $technician->getLastName());
        $statement->bindValue(':email', $technician->getEmail());
        $statement->bindValue(':phone', $technician->getPhone());
        $statement->execute();
        $statement->closeCursor();
    }
}
?>
