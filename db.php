<?php
class Database{
    public $pdo;
 
public function __construct($db = "op_5", $user ="root", $pwd="", $host="localhost:3307") {
 
    try {
        $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
 
    }
    public function aanmelden($naam, $achternaam, $geboortedatum, $email, $password) {
        $stmt = $this->pdo->prepare("INSERT INTO users (naam,achternaam,geboortedatum,email,wachtwoord) values (?,?,?,?,?)");
        $stmt->execute([$naam, $achternaam, $geboortedatum, $email, $password]);
    }
}