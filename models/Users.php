<?php
class Users{
    public $id;
    public $username;
    public $password;
    public $level;
    public $status;
    public $created_at;
    public $updated_at;
    
    public function __construct($username = FALSE, $password = FALSE, $level = FALSE, $status = FALSE){
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setLevel($level);
        $this->setStatus($status);
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function setPassword($password){
        $this->password = hash('sha256',$password);
    }
    public function setLevel($level){
        $this->level = $level;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    public function setCreated_at($created_at){
        $this->created_at = $created_at;
    }
    public function setUpdated_at($updated_at){
        $this->updated_at = $updated_at;
    }
    public function getId(){
        return $this->id;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getLevel(){
        return $this->level;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getCreated_at(){
        return $this->created_at;
    }
    public function getUpdated_at(){
        return $this->updated_at;
    }
    public function connect(){
        $database = new DB();
        return $database->connect();
    }
    public function insert(){
        $db = $this->connect();
        $stmt = $db->prepare("INSERT INTO users (username, password, level, status) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssii', $this->username, hash('sha256',$this->password), $this->level, $this->status);
        return $stmt->execute();
    }
    public function getAll(){
        $db = $this->connect();
        $result = $db->query('SELECT * FROM users');
        return $result->fetch_object();
    }
    public function findId($id){
        $db = $this->connect();
        $result = $db->query('SELECT * FROM users WHERE id = '.$id);
        return $result->fetch_object();
    }
    public function findUser($username){
        $db = $this->connect();
        $result = $db->query("SELECT * FROM users WHERE username = '".$username."'");
        // print_r($result->fetch_object());
        return $result->fetch_object();
    }
}