<?php

class BookingFlights {
    public $id;
    public $booking_id;
    public $flight_id;
    public $seat_class_id;
    public $price;

    public function __construct($_id, $_booking_id, $_flight_id, $_seat_class_id, $_price) {
        $this->id = $_id;
        $this->booking_id = $_booking_id;
        $this->flight_id = $_flight_id;
        $this->seat_class_id = $_seat_class_id;
        $this->price = $_price;
    }

    public function create() {
        global $db;
        $sql = "INSERT INTO booking_flights (id,booking_id,flight_id,seat_class_id,price) VALUES ('{$this->id}', '{$this->booking_id}', '{$this->flight_id}', '{$this->seat_class_id}', '{$this->price}')";
        if ($db->query($sql)) {
          return $db->insert_id;
        } else {
          return "Query failed: " . $db->error;
        }
    }

    public static function readAll() {
        global $db;
        $sql = "SELECT * FROM booking_flights";
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
        $sql = "SELECT * FROM booking_flights WHERE id = $id";
        $res = $db->query($sql);
        if ($res) {
          return $res->fetch_assoc();
        } else {
          return "Query failed: " . $db->error;
        }
    }

    public function update($id) {
        global $db;
        $sql = "UPDATE booking_flights SET id='{$this->id}', booking_id='{$this->booking_id}', flight_id='{$this->flight_id}', seat_class_id='{$this->seat_class_id}', price='{$this->price}' WHERE id = $id";
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
        $sql = "DELETE FROM booking_flights WHERE id = $id";
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
