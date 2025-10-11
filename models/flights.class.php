<?php

class Flights {
    public $flight_id;
    public $airline_id;
    public $departure_airport_id;
    public $arrival_airport_id;
    public $departure_time;
    public $arrival_time;
    public $flight_type_id;

    public function __construct($_flight_id, $_airline_id, $_departure_airport_id, $_arrival_airport_id, $_departure_time, $_arrival_time, $_flight_type_id) {
        $this->flight_id = $_flight_id;
        $this->airline_id = $_airline_id;
        $this->departure_airport_id = $_departure_airport_id;
        $this->arrival_airport_id = $_arrival_airport_id;
        $this->departure_time = $_departure_time;
        $this->arrival_time = $_arrival_time;
        $this->flight_type_id = $_flight_type_id;
    }

    public function create() {
        global $db;
        $sql = "INSERT INTO flights (flight_id,airline_id,departure_airport_id,arrival_airport_id,departure_time,arrival_time,flight_type_id) VALUES ('{$this->flight_id}', '{$this->airline_id}', '{$this->departure_airport_id}', '{$this->arrival_airport_id}', '{$this->departure_time}', '{$this->arrival_time}', '{$this->flight_type_id}')";
        if ($db->query($sql)) {
          return $db->insert_id;
        } else {
          return "Query failed: " . $db->error;
        }
    }

    public static function readAll() {
        global $db;
        $sql = "SELECT * FROM flights";
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
        $sql = "SELECT * FROM flights WHERE id = $id";
        $res = $db->query($sql);
        if ($res) {
          return $res->fetch_assoc();
        } else {
          return "Query failed: " . $db->error;
        }
    }

    public function update($id) {
        global $db;
        $sql = "UPDATE flights SET flight_id='{$this->flight_id}', airline_id='{$this->airline_id}', departure_airport_id='{$this->departure_airport_id}', arrival_airport_id='{$this->arrival_airport_id}', departure_time='{$this->departure_time}', arrival_time='{$this->arrival_time}', flight_type_id='{$this->flight_type_id}' WHERE id = $id";
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
        $sql = "DELETE FROM flights WHERE id = $id";
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
