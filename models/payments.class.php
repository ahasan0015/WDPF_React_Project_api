<?php

class Payments {
    public $payment_id;
    public $booking_id;
    public $amount;
    public $payment_date;
    public $payment_method_id;
    public $payment_status_id;

    public function __construct($_payment_id, $_booking_id, $_amount, $_payment_date, $_payment_method_id, $_payment_status_id) {
        $this->payment_id = $_payment_id;
        $this->booking_id = $_booking_id;
        $this->amount = $_amount;
        $this->payment_date = $_payment_date;
        $this->payment_method_id = $_payment_method_id;
        $this->payment_status_id = $_payment_status_id;
    }

    public function create() {
        global $db;
        $sql = "INSERT INTO payments (payment_id,booking_id,amount,payment_date,payment_method_id,payment_status_id) VALUES ('{$this->payment_id}', '{$this->booking_id}', '{$this->amount}', '{$this->payment_date}', '{$this->payment_method_id}', '{$this->payment_status_id}')";
        if ($db->query($sql)) {
          return $db->insert_id;
        } else {
          return "Query failed: " . $db->error;
        }
    }

    public static function readAll() {
        global $db;
        $sql = "SELECT * FROM payments";
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
        $sql = "SELECT * FROM payments WHERE id = $id";
        $res = $db->query($sql);
        if ($res) {
          return $res->fetch_assoc();
        } else {
          return "Query failed: " . $db->error;
        }
    }

    public function update($id) {
        global $db;
        $sql = "UPDATE payments SET payment_id='{$this->payment_id}', booking_id='{$this->booking_id}', amount='{$this->amount}', payment_date='{$this->payment_date}', payment_method_id='{$this->payment_method_id}', payment_status_id='{$this->payment_status_id}' WHERE id = $id";
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
        $sql = "DELETE FROM payments WHERE id = $id";
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
