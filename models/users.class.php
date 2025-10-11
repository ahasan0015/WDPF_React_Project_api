<?php

class Users {
    public $user_id;
    public $role_id;
    public $name;
    public $email;
    public $password;
    public $phone;
    public $created_at;

    public function __construct($_user_id, $_role_id, $_name, $_email, $_password, $_phone, $_created_at) {
        $this->user_id = $_user_id;
        $this->role_id = $_role_id;
        $this->name = $_name;
        $this->email = $_email;
        $this->password = $_password;
        $this->phone = $_phone;
        $this->created_at = $_created_at;
    }

    public function create() {
        global $db;
        $sql = "INSERT INTO users (user_id,role_id,name,email,password,phone,created_at) VALUES ('{$this->user_id}', '{$this->role_id}', '{$this->name}', '{$this->email}', '{$this->password}', '{$this->phone}', '{$this->created_at}')";
        if ($db->query($sql)) {
          return $db->insert_id;
        } else {
          return "Query failed: " . $db->error;
        }
    }

    public static function readAll() {
        global $db;
        $sql = "SELECT * FROM users";
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
        $sql = "SELECT * FROM users WHERE id = $id";
        $res = $db->query($sql);
        if ($res) {
          return $res->fetch_assoc();
        } else {
          return "Query failed: " . $db->error;
        }
    }

    public function update($id) {
        global $db;
        $sql = "UPDATE users SET user_id='{$this->user_id}', role_id='{$this->role_id}', name='{$this->name}', email='{$this->email}', password='{$this->password}', phone='{$this->phone}', created_at='{$this->created_at}' WHERE id = $id";
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
        $sql = "DELETE FROM users WHERE id = $id";
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
