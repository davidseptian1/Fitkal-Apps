<?php
class Database {
    private $host = "defbelajar.my.id"; 
    private $dbname = "defc2779_fitkal_apps";
    private $username = "defc2779_fitkal_apps";  // Ubah jika pakai username lain
    private $password = "fitkal_apps";      // Ubah jika pakai password MySQL

    public $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Koneksi Gagal: " . $e->getMessage());
        }
    }
}
?>
