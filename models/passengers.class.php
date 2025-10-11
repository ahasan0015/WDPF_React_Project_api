<?php

class Passengers {
    public $passenger_id;
    public $booking_id;
    public $name;
    public $age;
    public $passport_number;
    public $nationality;

    public function __construct($_passenger_id, $_booking_id, $_name, $_age, $_passport_number, $_nationality) {
        $this->passenger_id = $_passenger_id;
        $this->booking_id = $_booking_id;
        $this->name = $_name;
        $this->age = $_age;
        $this->passport_number = $_passport_number;
        $this->nationality = $_nationality;
    }

    public function create() {
        global $db;
        $sql = "INSERT INTO passengers (passenger_id,booking_id,name,age,passport_number,nationality) VALUES ('{$this->passenger_id}', '{$this->booking_id}', '{$this->name}', '{$this->age}', '{$this->passport_number}', '{$this->nationality}')";
        if ($db->query($sql)) {
          return $db->insert_id;
        } else {
          return "Query failed: " . $db->error;
        }
    }

    public static function readAll() {
        global $db;
        $sql = "SELECT * FROM passengers";
        $res = $db->query($sql);
        if ($res) {
          return $res->fetch_all(MYSQLI_ASSOC);
        } else {
          return "Query failed: " . $db->error;
        }
    }

    public static function readById($id) {
        global $db;
        $id = (int)$id;
        $sql = "SELECT * FROM passengers WHERE id = $id";
        $res = $db->query($sql);
        if ($res) {
          return $res->fetch_assoc();
        } else {
          return "Query failed: " . $db->error;
        }
    }

    public function update($id) {
        global $db;
        $sql = "UPDATE passengers SET passenger_id='{$this->passenger_id}', booking_id='{$this->booking_id}', name='{$this->name}', age='{$this->age}', passport_number='{$this->passport_number}', nationality='{$this->nationality}' WHERE id = $id";
        if ($db->query($sql)) {
          if ($db->affected_rows > 0) {
            return "Update successful.";
          } else {
            return "No changes made or record not found.";
          }
        } else {
          return "Update failed: " . $db->error;
        }
    }

    public static function delete($id) {
        global $db;
        $sql = "DELETE FROM passengers WHERE id = $id";
        if ($db->query($sql)) {
          if ($db->affected_rows > 0) {
            return "Delete successful.";
          } else {
            return "No record found with ID $id.";
          }
        } else {
          return "Delete failed: " . $db->error;
        }
    }
}
