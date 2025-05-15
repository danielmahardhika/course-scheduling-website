<?php
    class Admin {
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

        //LOGIN LOGIC
        public function loginLogic($nama, $password) {
            try {
                // Query untuk mendapatkan data admin berdasarkan id, nama, dan password
                $query = "SELECT * FROM admin_profiles WHERE nama = :nama AND password = :password";
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
        
        //SELECT
        //Method
        public function tampilkanKursus($kategori = '') {
            if ($kategori) {
                $query = $this->db->prepare("SELECT * FROM jadwal_kursus_user WHERE namaKursus LIKE :kategori AND status = 'aktif'");
                $query->bindParam(':kategori', $kategori);
            } else {
                $query = $this->db->prepare("SELECT * FROM jadwal_kursus_user WHERE status = 'aktif'");
            }
            
            $query->execute();
            
            $data = $query->fetchAll();
            return $data;
        }

        public function jadwalReady()
        {
            //query SQL
            $query = $this->db->prepare("SELECT * FROM jadwal_ready");

            //menjalankan Query
            $query->execute();

            //meletakkan hasil query ke array
            $data = $query->fetchAll();

            return $data;
        }

        public function tampilkanUser()
        {
            //query SQL
            $query = $this->db->prepare("SELECT * FROM user_profiles");

            //menjalankan Query
            $query->execute();

            //meletakkan hasil query ke array
            $data = $query->fetchAll();

            return $data;
        }


        public function tambahJadwal($a, $b, $c) {
            try {
                // Masukkan data ke tabel tbjadwalkursus
                $query = $this->db->prepare("INSERT INTO jadwal_ready (namaJadwal, tanggal, waktu) VALUES(:namaJadwal, :tanggal, :waktu)");
                $query->bindParam(":namaJadwal", $a);
                $query->bindParam(":tanggal", $b);
                $query->bindParam(":waktu", $c);

                if ($query->execute()) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }
        }

        public function tambahUser($a, $b) {
            try {
                // Masukkan data ke tabel tbjadwalkursus
                $query = $this->db->prepare("INSERT INTO user_profiles (nama, password) VALUES(:nama, :password)");
                $query->bindParam(":nama", $a);
                $query->bindParam(":password", $b);

                if ($query->execute()) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }
        }

        //UPDATE
        /*Proses update melibatkan 2 Query
            1. Select + Where id yang akan diupdate
            2. Update
        */
        public function tampilkanKursusByID($id){
            $query = $this->db->prepare("SELECT * FROM jadwal_kursus_user WHERE idJadwalKursus=:idJadwalKursus");
            $query->bindParam(":idJadwalKursus",$id);
            $query->execute();

            $data=$query->fetchAll();
            return $data;
        }

        public function tampilkanJadwalByID($id){
            $query = $this->db->prepare("SELECT * FROM jadwal_ready WHERE idJadwal=:idJadwal");
            $query->bindParam(":idJadwal",$id);
            $query->execute();

            $data=$query->fetchAll();
            return $data;
        }

        public function tampilkanUserByID($id){
            $query = $this->db->prepare("SELECT * FROM user_profiles WHERE idUser=:idUser");
            $query->bindParam(":idUser",$id);
            $query->execute();

            $data=$query->fetchAll();
            return $data;
        }


        public function ubahKursus($a,$b,$c,$d,$e){
            $query = $this->db->prepare("UPDATE jadwal_kursus_user SET namaUser=:namaUser,namaKursus=:namaKursus,tanggal=:tanggal,waktu=:waktu WHERE idJadwalKursus=:idJadwalKursus");
            $query->bindParam(":idJadwalKursus",$a);
            $query->bindParam(":namaUser",$b);
            $query->bindParam(":namaKursus",$c);
            $query->bindParam(":tanggal",$d);
            $query->bindParam(":waktu",$e);

            if($query->execute()) return true;
            else return false;
        }

        public function ubahJadwal($a,$b,$c,$d){
            $query = $this->db->prepare("UPDATE jadwal_ready SET namaJadwal=:namaJadwal, tanggal=:tanggal, waktu=:waktu WHERE idJadwal=:idJadwal");
            $query->bindParam(":idJadwal",$a);
            $query->bindParam(":namaJadwal",$b);
            $query->bindParam(":tanggal",$c);
            $query->bindParam(":waktu",$d);

            if($query->execute()) return true;
            else return false;
        }

        public function ubahUser($a,$b){
            $query = $this->db->prepare("UPDATE user_profiles SET password=:password WHERE idUser=:idUser");
            $query->bindParam(":idUser",$a);
            $query->bindParam(":password",$b);

            if($query->execute()) return true;
            else return false;
        }

        //DELETE
        public function hapusKursus($id){
            $query = $this->db->prepare("DELETE FROM jadwal_kursus_user where idJadwalKursus=:idJadwalKursus");
            $query->bindParam(":idJadwalKursus",$id);

            if($query->execute()) return true;
            else return false;
        }

        public function hapusjadwal($id){
            $query = $this->db->prepare("DELETE FROM jadwal_ready where idJadwal=:idJadwal");
            $query->bindParam(":idJadwal",$id);

            if($query->execute()) return true;
            else return false;
        }

        public function hapusUser($id){
            $query = $this->db->prepare("DELETE FROM user_profiles where idUser=:idUser");
            $query->bindParam(":idUser",$id);

            if($query->execute()) return true;
            else return false;
        }
    }
?>
