<?php

class Instruktur
{

    // Atribut untuk config database
    public $host = "127.0.0.1";
    public $name = "dbkursus";
    public $user = "root";
    public $pass = "";

    public $db;

    //Konstruktor
    //Method yang otomatis terpanggil ketika objek dibuat atau di instance
    public function __construct()
    {
        //menggabungkan string menjadi string connection ke db
        $this->db = new PDO(
            "mysql:host={$this->host};
            dbname={$this->name}",
            $this->user,
            $this->pass

        );
    }

    // Login Method
    public function loginLogic($nama, $password)
    {
        try {
            // Query untuk mendapatkan data admin berdasarkan id, nama, dan password
            $query = "SELECT * FROM instruktur_profiles WHERE nama = :nama AND password = :password";
            $stmt = $this->db->prepare($query);

            // Bind parameter
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':password', $password);

            // Jalankan query
            $stmt->execute();

            // Ambil data
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Jika ada data yang ditemukan
            if ($result) {
                return true; // Login berhasil
            } else {
                return false; // Login gagal
            }
        } catch (PDOException $error) {
            die("Error: " . $error->getMessage());
        }
    }

    // READ
    public function readJadwalKursus()
    {
        //query SQL
        $query = $this->db->prepare("SELECT * FROM jadwal_kursus_user");

        //menjalankan Query
        $query->execute();

        //meletakkan hasil query ke array
        $data = $query->fetchAll();

        return $data;
    }

    //verification update method
    public function update($idJadwalKursus)
    {
        $query = $this->db->prepare(
            "UPDATE jadwal_kursus_user 
            SET status = 'aktif' 
            WHERE idJadwalKursus = :idJadwalKursus AND status = 'request'"
        );

        // Bind parameter
        $query->bindParam(":idJadwalKursus", $idJadwalKursus);

        if ($query->execute()) {
            return true; // Berhasil diupdate
        } else {
            return false; // Gagal diupdate
        }
    }
    //verification update method
    public function delete($idJadwalKursus)
    {
        $query = $this->db->prepare(
            "DELETE FROM jadwal_kursus_user 
        WHERE idJadwalKursus = :idJadwalKursus"
        );

        // Bind parameter
        $query->bindParam(":idJadwalKursus", $idJadwalKursus);

        if ($query->execute()) {
            return true; // Berhasil dihapus
        } else {
            return false; // Gagal dihapus
        }
    }
}
