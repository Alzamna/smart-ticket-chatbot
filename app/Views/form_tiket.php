<form action="<?= base_url('tiketing/store') ?>" method="post">
    <?= csrf_field() ?>
    <label>Nama User</label>
    <input type="text" name="id_user" value="1" hidden> <!-- nanti bisa otomatis dari session -->
    <label>Jenis Layanan</label>
    <input type="text" name="jenis_layanan" class="form-control" required>
    <button type="submit" class="btn btn-primary mt-2">Buat Tiket</button>
</form>
