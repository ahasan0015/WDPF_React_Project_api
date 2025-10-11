<?php

class Airports {
    public $airport_id;
    public $airport_name;
    public $city;
    public $country;

    public function __construct($_airport_id, $_airport_name, $_city, $_country) {
        $this->airport_id = $_airport_id;
        $this->airport_name = $_airport_name;
        $this->city = $_city;
        $this->country = $_country;
    }

    public function create() {
        global $db;
        $sql = "INSERT INTO airports (airport_id,airport_name,city,country) VALUES ('{$this->airport_id}', '{$this->airport_name}', '{$this->city}', '{$this->country}')";
        if ($db->query($sql)) {
          return $db->insert_id;
        } else {
          return "Query failed: " . $db->error;
        }
    }

    public static function readAll() {
        global $db;
        $sql = "SELECT * FROM airports";
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
        $sql = "SELECT * FROM airports WHERE id = $id";
        $res = $db->query($sql);
        if ($res) {
          return $res->fetch_assoc();
        } else {
          return "Query failed: " . $db->error;
        }
    }

    public function update($id) {
        global $db;
        $sql = "UPDATE airports SET airport_id='{$this->airport_id}', airport_name='{$this->airport_name}', city='{$this->city}', country='{$this->country}' WHERE id = $id";
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
        $sql = "DELETE FROM airports WHERE id = $id";
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
