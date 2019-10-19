<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Tes - Bootcamp - Dumbways</title>
</head>

<body>
    <?php
    $nama = $nim = $kehadiran = $tugas = $uas = $total = $grade = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST["nama"];
        $nim = $_POST["nim"];
        $kehadiran = $_POST["jml_hadir"];
        $tugas = $_POST["tugas"];
        $uts = $_POST["uts"];
        $uas = $_POST["uas"];
        $total = ((0.1 * $kehadiran) + (0.2 * $tugas) + (0.3 * $uts) + (0.4 * $uas));
        if ($kehadiran and $tugas and $uts and $uas !== 0) {
            if ($total < 50) {
                $grade = "E";
            } elseif ($total >= 50 and $total <= 60) {
                $grade = "D";
            } elseif ($total >= 61 and $total <= 70) {
                $grade = "C";
            } elseif ($total >= 71 and $total <= 79) {
                $grade = "B";
            } else {
                $grade = "A";
            }
        } else {
            $grade = "E";
        }
    }
    ?>
    <div class="container">
        <h1>Universitas Dumbways</h1>
        <div class="row">
            <div class="col-md-6">
                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" name="nim" class="form-control" id="nim" placeholder="nim" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jml_hadir" class="col-sm-2 col-form-label">Jumlah Hadir</label>
                        <div class="col-sm-10">
                            <input type="text" name="jml_hadir" class="form-control" id="jml_hadir" placeholder="jml_hadir" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tugas" class="col-sm-2 col-form-label">Tugas</label>
                        <div class="col-sm-10">
                            <input type="text" name="tugas" class="form-control" id="tugas" placeholder="tugas" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="uts" class="col-sm-2 col-form-label">UTS</label>
                        <div class="col-sm-10">
                            <input type="text" name="uts" class="form-control" id="uts" placeholder="uts" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="uas" class="col-sm-2 col-form-label">UAS</label>
                        <div class="col-sm-10">
                            <input type="text" name="uas" class="form-control" id="uas" placeholder="uas" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Proses</button>
                </form>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $nama; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" name="nim" class="form-control" id="nim" value="<?= $nim; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nilai" class="col-sm-2 col-form-label">Nilai</label>
                    <div class="col-sm-10">
                        <input type="text" name="nilai" class="form-control" id="nilai" value="<?= $grade; ?>" readonly>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>