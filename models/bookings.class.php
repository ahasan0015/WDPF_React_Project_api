<?php

class Bookings {
    public $booking_id;
    public $user_id;
    public $booking_type_id;
    public $booking_date;
    public $total_price;
    public $status_id;

    public function __construct($_booking_id, $_user_id, $_booking_type_id, $_booking_date, $_total_price, $_status_id) {
        $this->booking_id = $_booking_id;
        $this->user_id = $_user_id;
        $this->booking_type_id = $_booking_type_id;
        $this->booking_date = $_booking_date;
        $this->total_price = $_total_price;
        $this->status_id = $_status_id;
    }

    public function create() {
        global $db;
        $sql = "INSERT INTO bookings (booking_id,user_id,booking_type_id,booking_date,total_price,status_id) VALUES ('{$this->booking_id}', '{$this->user_id}', '{$this->booking_type_id}', '{$this->booking_date}', '{$this->total_price}', '{$this->status_id}')";
        if ($db->query($sql)) {
          return $db->insert_id;
        } else {
          return "Query failed: " . $db->error;
        }
    }

    public static function readAll() {
        global $db;
        $sql = "SELECT * FROM bookings";
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
        $sql = "SELECT * FROM bookings WHERE id = $id";
        $res = $db->query($sql);
        if ($res) {
          return $res->fetch_assoc();
        } else {
          return "Query failed: " . $db->error;
        }
    }

    public function update($id) {
        global $db;
        $sql = "UPDATE bookings SET booking_id='{$this->booking_id}', user_id='{$this->user_id}', booking_type_id='{$this->booking_type_id}', booking_date='{$this->booking_date}', total_price='{$this->total_price}', status_id='{$this->status_id}' WHERE id = $id";
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
        $sql = "DELETE FROM bookings WHERE id = $id";
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
