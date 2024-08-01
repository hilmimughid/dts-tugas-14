<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Mahasiswa</title>

    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <h1 class="text-center my-3">CRUD Data Mahasiswa</h1>
        <div class="mb-3 d-flex justify-content-end">
            <a href="create.php" class="btn btn-primary me-3">Tambah</a>
            <a href="create.php" class="text-white btn btn-warning me-3">Edit</a>
            <a href="create.php" class="btn btn-danger">Hapus</a>
        </div>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tempat Lahir</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Program Studi</th>
                    <th scope="col">IPK</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'database.php';

                class TampilData extends Database
                {
                    public function tampilData()
                    {
                        $query = "SELECT id, nim, nama, tempat_lahir, tanggal_lahir, jurusan, program_studi, ipk FROM mahasiswa";
                        $result = $this->connection->query($query);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['nim'] . "</td>";
                                echo "<td>" . $row['nama'] . "</td>";
                                echo "<td>" . $row['tempat_lahir'] . "</td>";
                                $tanggalLahir = date("d-m-Y", strtotime($row['tanggal_lahir']));
                                echo "<td>" . $tanggalLahir . "</td>";
                                echo "<td>" . $row['jurusan'] . "</td>";
                                echo "<td>" . $row['program_studi'] . "</td>";
                                echo "<td>" . $row['ipk'] . "</td>";
                                echo "</tr>";
                            }
                        }
                    }
                }

                $tampilData = new TampilData();
                $tampilData->tampilData();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>