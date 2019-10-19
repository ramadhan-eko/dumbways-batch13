<!DOCTYPE html>
<html>

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
    // --- koneksi ke database
    $koneksi = mysqli_connect("localhost", "root", "", "db_gudang") or die(mysqli_error());
    // --- Fngsi tambah data (Create)
    function tambah($koneksi)
    {

        if (isset($_POST['btn_simpan'])) {
            $nama = $_POST['nama'];
            $stok = $_POST['stok'];
            $deskripsi = $_POST['deskripsi'];
            $kategori = $_POST['kategori'];

            if (!empty($nama) && !empty($stok) && !empty($deskripsi) && !empty($kategori)) {
                $sql = "INSERT INTO tabel_panen (nama, stock, deskripsi, category_id ) VALUES(" . $nama . ",'" . $stok . "','" . $deskripsi . "','" . $kategori . "')";
                $simpan = mysqli_query($koneksi, $sql);
                if ($simpan && isset($_GET['aksi'])) {
                    if ($_GET['aksi'] == 'create') {
                        header('location: 6.php');
                    }
                }
            } else {
                $pesan = "Tidak dapat menyimpan, data belum lengkap!";
            }
        }
        ?>
        <form action="" method="POST">
            <fieldset>
                <legend>
                    <h2>Tambah data</h2>
                </legend>
                <label>Nama <input type="text" name="nama" /></label> <br>
                <label>Stok <input type="number" name="stok" /> Pcs</label><br>
                <label>Deskripsi <input type="text" name="deskripsi" /></label> <br>
                <select name="kategori" id="">
                    <option value="1">Makanan</option>
                    <option value="2">Minuman</option>
                </select>
                <br>
                <label>
                    <input type="submit" name="btn_simpan" value="Simpan" />
                    <input type="reset" name="reset" value="Besihkan" />
                </label>
                <br>
                <p><?php echo isset($pesan) ? $pesan : "" ?></p>
            </fieldset>
        </form>
        <?php
        }
        // --- Tutup Fngsi tambah data
        // --- Fungsi Baca Data (Read)
        function tampil_data($koneksi)
        {
            $sql = "SELECT * FROM products";
            $query = mysqli_query($koneksi, $sql);

            echo "<fieldset>";
            echo "<legend><h2>Data Barang</h2></legend>";

            echo "<table border='1' cellpadding='10'>";
            echo "<tr>
			<th>ID</th>
			<th>Nama</th>
			<th>Stok</th>
			<th>Deskripsi</th>
			<th>Kategori ID</th>
			<th>Aksi</th>
		  </tr>";

            while ($data = mysqli_fetch_array($query)) {
                ?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['stock']; ?> Pcs</td>
                <td><?php echo $data['deskripsi']; ?></td>
                <td><?php echo $data['category_id']; ?></td>
                <td>
                    <a href="index.php?aksi=update&id=<?php echo $data['id']; ?>&nama=<?php echo $data['nama']; ?>&stok=<?php echo $data['stock']; ?>&deskripsi=<?php echo $data['deskripsi']; ?>&kategori=<?php echo $data['category_id']; ?>">Ubah</a> |
                    <a href="index.php?aksi=delete&id=<?php echo $data['id']; ?>">Hapus</a>
                </td>
            </tr>
        <?php
            }
            echo "</table>";
            echo "</fieldset>";
        }
        // --- Tutup Fungsi Baca Data (Read)
        // --- Fungsi Ubah Data (Update)
        function ubah($koneksi)
        {
            // ubah data
            if (isset($_POST['btn_ubah'])) {
                $id = $_POST['id'];
                $nama = $_POST['nama'];
                $stok = $_POST['stok'];
                $deskripsi = $_POST['deskripsi'];
                $kategori = $_POST['kategori'];

                if (!empty($nm_tanaman) && !empty($hasil) && !empty($lama) && !empty($tgl_panen)) {
                    $perubahan = "nama_tanaman='" . $nm_tanaman . "',hasil_panen=" . $hasil . ",lama_tanam=" . $lama . ",tanggal_panen='" . $tgl_panen . "'";
                    $sql_update = "UPDATE tabel_panen SET " . $perubahan . " WHERE id=$id";
                    $update = mysqli_query($koneksi, $sql_update);
                    if ($update && isset($_GET['aksi'])) {
                        if ($_GET['aksi'] == 'update') {
                            header('location: index.php');
                        }
                    }
                } else {
                    $pesan = "Data tidak lengkap!";
                }
            }

            // tampilkan form ubah
            if (isset($_GET['id'])) {
                ?>
            <a href="index.php"> &laquo; Home</a> |
            <a href="index.php?aksi=create"> (+) Tambah Data</a>
            <hr>

            <form action="" method="POST">
                <fieldset>
                    <legend>
                        <h2>Ubah data</h2>
                    </legend>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
                    <label>Nama tanaman <input type="text" name="nm_tanaman" value="<?php echo $_GET['nama'] ?>" /></label> <br>
                    <label>Hasil panen <input type="number" name="hasil" value="<?php echo $_GET['hasil'] ?>" /> kg</label><br>
                    <label>Lama tanam <input type="number" name="lama" value="<?php echo $_GET['lama'] ?>" /> bulan</label> <br>
                    <label>Tanggal panen <input type="date" name="tgl_panen" value="<?php echo $_GET['tanggal'] ?>" /></label> <br>
                    <br>
                    <label>
                        <input type="submit" name="btn_ubah" value="Simpan Perubahan" /> atau <a href="index.php?aksi=delete&id=<?php echo $_GET['id'] ?>"> (x) Hapus data ini</a>!
                    </label>
                    <br>
                    <p><?php echo isset($pesan) ? $pesan : "" ?></p>

                </fieldset>
            </form>
        <?php
            }
        }
        // --- Tutup Fungsi Update
        // --- Fungsi Delete
        function hapus($koneksi)
        {
            if (isset($_GET['id']) && isset($_GET['aksi'])) {
                $id = $_GET['id'];
                $sql_hapus = "DELETE FROM tabel_panen WHERE id=" . $id;
                $hapus = mysqli_query($koneksi, $sql_hapus);

                if ($hapus) {
                    if ($_GET['aksi'] == 'delete') {
                        header('location: index.php');
                    }
                }
            }
        }
        // --- Tutup Fungsi Hapus
        // ===================================================================
        // --- Program Utama
        if (isset($_GET['aksi'])) {
            switch ($_GET['aksi']) {
                case "create":
                    echo '<a href="6.php"> &laquo; Home</a>';
                    tambah($koneksi);
                    break;
                case "read":
                    tampil_data($koneksi);
                    break;
                case "update":
                    ubah($koneksi);
                    tampil_data($koneksi);
                    break;
                case "delete":
                    hapus($koneksi);
                    break;
                default:
                    echo "<h3>Aksi <i>" . $_GET['aksi'] . "</i> tidaka ada!</h3>";
                    tambah($koneksi);
                    tampil_data($koneksi);
            }
        } else {
            tambah($koneksi);
            tampil_data($koneksi);
        }
        ?>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>