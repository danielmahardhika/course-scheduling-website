<?php
class admin
{
    public $host = "127.0.0.1";
    public $name = "dbkursus";
    public $user = "root";
    public $pass = "";

    public $db;

    // Constructor
    public function __construct()
    {
        $this->db = new PDO(
            "mysql:host={$this->host};dbname={$this->name}",
            $this->user,
            $this->pass
        );
    }

    public function loginLogic($userId, $userName, $userPassword)
    {
        try {
            // Query untuk admin
            $queryAdmin = "SELECT * FROM admin_profiles WHERE id = :id AND nama = :nama AND password = :password";
            $stmtAdmin = $this->db->prepare($queryAdmin);

            // Bind parameter untuk admin
            $stmtAdmin->bindParam(':id', $userId);
            $stmtAdmin->bindParam(':nama', $userName);
            $stmtAdmin->bindParam(':password', $userPassword);

            $stmtAdmin->execute();

            if ($stmtAdmin->rowCount() > 0) {
                // Jika login sebagai admin berhasil
                header("Location: ../frontend/view-dashboard.php");
                exit();
            } else {
                // Query untuk user biasa
                $queryUser = "SELECT * FROM user_profiles WHERE idUser = :id AND nama = :nama AND password = :password";
                $stmtUser = $this->db->prepare($queryUser);

                // Bind parameter untuk user
                $stmtUser->bindParam(':id', $userId);
                $stmtUser->bindParam(':nama', $userName);
                $stmtUser->bindParam(':password', $userPassword);

                $stmtUser->execute();

                if ($stmtUser->rowCount() > 0) {
                    // Jika login sebagai user berhasil
                    header("Location: ../frontend/view-tambah-kursus.php");
                    exit();
                } else {
                    // Jika kedua login gagal
                    echo "ID, Nama, atau Password salah!";
                }
            }
        } catch (PDOException $error) {
            die("Error : " . $error->getMessage());
        }
    }
}
