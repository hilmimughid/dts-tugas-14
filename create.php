<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Data Mahasiswa</title>

    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-5">Form Create Data Mahasiswa</h1>
        <form action="create.php" method="POST">
            <label for="nim" class="form-label">NIM:</label>
            <input type="text" class="form-control" name="nim" placeholder="Masukkan NIM" required><br>

            <label for="nama" class="form-label">Nama:</label>
            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required><br>

            <label for="tempat_lahir" class="form-label">Tempat Lahir:</label>
            <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" required><br>

            <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
            <input type="date" class="form-control" name="tanggal_lahir" required><br>

            <label for="jurusan" class="form-label">Jurusan:</label>
            <input type="text" class="form-control" name="jurusan" placeholder="Masukkan Jurusan" required><br>

            <label for="program_studi" class="form-label">Program Studi:</label>
            <input type="text" class="form-control" name="program_studi" placeholder="Masukkan Program Studi" required><br>

            <label for="ipk" class="form-label">IPK:</label>
            <input type="number" class="form-control" name="ipk" placeholder="Masukkan IPK" required><br>
            <div class="d-flex justify-content-between">
                <a href="index.php" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

        <?php
        include 'database.php';

        class TambahData extends Database
        {
            public function create($nim, $nama, $tempat_lahir, $tanggal_lahir, $jurusan, $program_studi, $ipk)
            {
                $query = "INSERT INTO mahasiswa (nim, nama, tempat_lahir, tanggal_lahir, jurusan, program_studi, ipk) VALUES ('$nim', '$nama', '$tempat_lahir', '$tanggal_lahir', '$jurusan', '$program_studi', '$ipk')";
                if ($this->connection->query($query) === TRUE) {
                    header("location: index.php");
                    exit;
                } else {
                    $error_message = "Error: " . $query . "<br>" . $this->connection->error;
                    echo '<div class="alert alert-danger" role="alert">' . $error_message . '</div>';
                }
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tambahData = new TambahData();
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $tempat_lahir = $_POST['tempat_lahir'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $jurusan = $_POST['jurusan'];
            $program_studi = $_POST['program_studi'];
            $ipk = $_POST['ipk'];
            echo $tambahData->create($nim, $nama, $tempat_lahir, $tanggal_lahir, $jurusan, $program_studi, $ipk);
        }
        ?>
    </div>
</body>

</html>