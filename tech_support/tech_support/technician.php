<?php
class Technician {
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $phone;

    public function __construct($id, $first_name, $last_name, $email, $phone) {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->phone = $phone;
    }

    public function getId() {
        return $this->id;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getFullName() {
        return $this->first_name . ' ' . $this->last_name;
    }
}
?>
