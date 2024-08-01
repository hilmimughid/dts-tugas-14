<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Data Mahasiswa</title>

    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Form Delete Data Mahasiswa</h1>
        <form action="delete.php" method="POST">
            <label for="id" class="form-label">ID:</label>
            <input type="number" class="form-control" name="id" placeholder="Masukkan ID data yang ingin dihapus" required><br>

            <div class="d-flex justify-content-between">
                <a href="index.php" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

        <?php
        include 'database.php';

        class HapusData extends Database
        {
            public function delete($id)
            {
                $query = "DELETE FROM mahasiswa WHERE id = '$id'";
                $result = $this->connection->query($query);
                if ($result == true) {
                    header("location: index.php");
                    exit;
                } else {
                    echo "<div class='alert alert-danger mt-3'>Data gagal dihapus</div>";
                }
            }
        }

        $hapusData = new HapusData();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $hapusData->delete($id);
        }
        ?>
    </div>
</body>

</html>