<html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body></body>
</html>


<?php

    class User
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

    //LOGIN LOGIC
    public function loginLogic($nama, $password) {
        try {
        // Query untuk mendapatkan data admin berdasarkan id, nama, dan password
        $query = "SELECT * FROM user_profiles WHERE nama = :nama AND password = :password";
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
        // End of LOGIN LOGIC

        // SignUp Logic
    public function signUpLogic($nama, $password){
        try {
            // Mengecek apakah nama pengguna sudah ada
            $queryCheck = "SELECT * FROM user_profiles WHERE nama = :nama";
            $stmtCheck = $this->db->prepare($queryCheck);
            $stmtCheck->bindParam(':nama', $nama); // Perbaikan di sini
            $stmtCheck->execute();

            if ($stmtCheck->rowCount() > 0) {
                // nama sudah digunakan, tampilkan alert dan redirect
                echo "<script>alert('Nama pengguna sudah terdaftar.'); window.location.href='../../frontend/user/view-signup-user.php';</script>";
                return;
            }

            // Query untuk menambahkan data pengguna baru
            $queryInsert = "INSERT INTO user_profiles (nama, password) VALUES (:nama, :password)";
            $stmtInsert = $this->db->prepare($queryInsert);

            // Bind parameter
            $stmtInsert->bindParam(':nama', $nama);
            $stmtInsert->bindParam(':password', $password); // Menyimpan password dalam plaintext

            // Eksekusi query untuk insert data
            $stmtInsert->execute();

            // Setelah pendaftaran berhasil, beri tahu user dan arahkan mereka ke halaman login
            echo"<script>
                Swal.fire({
                        title: 'Berhasil!',
                        text: 'Pendaftaran Berhasil!, Silahkan Login',
                        icon: 'success',
                        confirmButtonColor: '#000000'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../../frontend/user/view-login-user.php';
                    }
                });
            </script>";
        } catch (PDOException $error) {
                die("Error: " . $error->getMessage());
        }
    }
        // End of SIGN UP LOGIC

        //Read Jadwal Tersedia
        public function jadwalReadyMobil()
        {
            //query SQL
            $query = $this->db->prepare("SELECT * FROM jadwal_ready WHERE namaJadwal='Mobil'");

            //menjalankan Query
            $query->execute();

            //meletakkan hasil query ke array
            $data = $query->fetchAll();

            return $data;
        }

        public function jadwalReadyMotor()
        {
            //query SQL
            $query = $this->db->prepare("SELECT * FROM jadwal_ready WHERE namaJadwal='Motor'");

            //menjalankan Query
            $query->execute();

            //meletakkan hasil query ke array
            $data = $query->fetchAll();

            return $data;
        }
        //End of Read Jadwal Tersedia

        // Pesan Kursus (CREATE)
        public function pesanKursus($idUser, $namaKursus, $namaUser, $idJadwal, $tanggal, $waktu, $status)
        {
            $query = $this->db->prepare(
                "INSERT INTO jadwal_kursus_user(idUser, namaKursus, namaUser, idJadwal, tanggal, waktu, status)
                values(:idUser, :namaKursus, :namaUser, :idJadwal, :tanggal, :waktu, :status)
                "
            );

            $query->bindParam(":idUser", $idUser);
            $query->bindParam(":namaKursus", $namaKursus);
            $query->bindParam(":namaUser", $namaUser);
            $query->bindParam(":idJadwal", $idJadwal);
            $query->bindParam(":tanggal", $tanggal);
            $query->bindParam(":waktu", $waktu);
            $query->bindParam(":status", $status);

            if ($query->execute()) {
                # code...
                return true;
            } else {
                return false;
            }
        }
        // End of Pesan Kursus (CREATE)

        // TAMPIL DATA
        public function tampilDataMobil()
        {
            // Pastikan idUser diambil dari sesi
            if (!isset($_SESSION["user_id"])) {
                // Jika idUser tidak tersedia, kembalikan array kosong
                return [];
            }

            $idUser = $_SESSION["user_id"];

            $query = $this->db->prepare(
                "SELECT * FROM jadwal_kursus_user WHERE idUser = :idUser AND namaKursus = 'Mobil'"
            );
            $query->bindParam(":idUser", $idUser);
            $query->execute();

            $data = $query->fetchAll();
            return $data;
        }

        public function tampilDataMotor()
        {
            // Pastikan idUser diambil dari sesi
            if (!isset($_SESSION["user_id"])) {
                // Jika idUser tidak tersedia, kembalikan array kosong
                return [];
            }

            $idUser = $_SESSION["user_id"];

            $query = $this->db->prepare(
                "SELECT * FROM jadwal_kursus_user WHERE idUser = :idUser AND namaKursus = 'Motor'"
            );
            $query->bindParam(":idUser", $idUser);
            $query->execute();

            $data = $query->fetchAll();
            return $data;
        }
        // End of TAMPIL DATA
}