<!DOCTYPE html>
<html>
<head>
  <title>Upload Dokumen</title>
  <style>
    body { font-family: Arial; margin: 40px; background: #f4f4f4; }
    form { background: #fff; padding: 20px; border-radius: 10px; width: 400px; margin: auto; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    input, select { width: 100%; margin-bottom: 10px; padding: 8px; border: 1px solid #ccc; border-radius: 5px; }
    button { background: #007bff; color: #fff; border: none; padding: 10px; border-radius: 5px; cursor: pointer; }
    .alert { margin-top: 15px; padding: 10px; border-radius: 5px; }
    .alert-success { background: #d4edda; color: #155724; }
  </style>
</head>
<body>

<form action="<?= base_url('documents/upload/' . $ticketId) ?>" method="post" enctype="multipart/form-data">
  <?= csrf_field() ?>
  <h3>Upload Dokumen</h3>

  <label for="tipe">Tipe Dokumen</label>
  <select name="tipe_dokumen" required>
    <option value="">-- Pilih Dokumen --</option>
    <option value="KTP">KTP</option>
    <option value="KK">Kartu Keluarga</option>
    <option value="NPWP">NPWP</option>
    <option value="Surat Keterangan Usaha">Surat Keterangan Usaha</option>
  </select>

  <label for="file">Pilih File</label>
  <input type="file" name="file" required>

  <button type="submit">Upload & Validasi</button>

  <?php if (session()->getFlashdata('ai_message')): ?>
    <div class="alert alert-success">
      <b>Hasil Validasi AI:</b> <br>
      <?= session()->getFlashdata('ai_message') ?>
    </div>
  <?php endif; ?>
</form>

</body>
</html>
