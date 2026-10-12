<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Program Kerja BEM</title>
</head>
<body>

<?php
$isKepala = isset($_SESSION['role']) && $_SESSION['role'] === 'kepala_departemen';
$action   = isset($_GET['action']) ? $_GET['action'] : 'list';
?>

<p>
  Login sebagai: <strong><?= htmlspecialchars($_SESSION['username']) ?></strong>
  (<?= htmlspecialchars($_SESSION['role']) ?>)
  &nbsp;|&nbsp;
  <a href="logout.php">Logout</a>
</p>

<hr>

<?php if ($action === 'tambah' && $isKepala): ?>

  <h2>Tambah Program Kerja</h2>
  <form method="POST" action="index.php?action=simpan">
    <label>Nomor Program:</label><br>
    <input type="text" name="nomorProgram" required><br><br>

    <label>Nama Program Kerja:</label><br>
    <input type="text" name="namaProgram" required><br><br>

    <label>Surat Keterangan:</label><br>
    <textarea name="suratKeterangan" rows="3"></textarea><br><br>

    <input type="submit" value="Simpan">
    <a href="index.php">Batal</a>
  </form>

<?php elseif ($action === 'edit' && $isKepala && isset($proker)): ?>

  <h2>Edit Program Kerja</h2>
  <form method="POST" action="index.php?action=update">
    <input type="hidden" name="nomorProgram" value="<?= htmlspecialchars($proker['nomorProgram']) ?>">

    <label>Nomor Program:</label><br>
    <input type="text" value="<?= htmlspecialchars($proker['nomorProgram']) ?>" disabled><br><br>

    <label>Nama Program Kerja:</label><br>
    <input type="text" name="namaProgram" required value="<?= htmlspecialchars($proker['namaProgram']) ?>"><br><br>

    <label>Surat Keterangan:</label><br>
    <textarea name="suratKeterangan" rows="3"><?= htmlspecialchars($proker['suratKeterangan']) ?></textarea><br><br>

    <input type="submit" value="Update">
    <a href="index.php">Batal</a>
  </form>

<?php else: ?>

  <h2>Daftar Program Kerja BEM</h2>

  <?php if ($isKepala): ?>
    <a href="index.php?action=tambah">+ Tambah Program Kerja</a><br><br>
  <?php endif; ?>

  <table border="1" cellpadding="6" cellspacing="0">
    <thead>
      <tr>
        <th>No</th>
        <th>Nomor Program</th>
        <th>Nama Program Kerja</th>
        <th>Surat Keterangan</th>
        <?php if ($isKepala): ?>
          <th>Aksi</th>
        <?php endif; ?>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($prokers)): ?>
        <?php $no = 1; foreach ($prokers as $row): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['nomorProgram']) ?></td>
            <td><?= htmlspecialchars($row['namaProgram']) ?></td>
            <td><?= htmlspecialchars($row['suratKeterangan']) ?></td>
            <?php if ($isKepala): ?>
              <td>
                <a href="index.php?action=edit&id=<?= urlencode($row['nomorProgram']) ?>">Edit</a> |
                <a href="index.php?action=hapus&id=<?= urlencode($row['nomorProgram']) ?>"
                   onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
              </td>
            <?php endif; ?>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="<?= $isKepala ? 5 : 4 ?>">Belum ada data program kerja.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>

<?php endif; ?>

</body>
</html>
