<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tiket Pelayanan</title>

    <!-- Bootstrap 5 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }
        .table thead {
            background: #0d6efd;
            color: white;
        }
        .badge {
            font-size: 0.85rem;
        }
        .btn-primary {
            border-radius: 8px;
        }
    </style>
</head>
<body>
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary mb-0">
            <i class="bi bi-ticket-perforated"></i> Daftar Tiket Pelayanan
        </h2>
        <a href="<?= base_url('tiket/buat') ?>" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle"></i> Buat Tiket Baru
        </a>
    </div>

    <div class="card p-4">
        <?php if (!empty($tickets)): ?>
            <div class="table-responsive">
                <table class="table align-middle table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nomor Tiket</th>
                            <th>Nama Pemohon</th>
                            <th>Layanan</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($tickets as $t): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><strong><?= esc($t['nomor_tiket']) ?></strong></td>
                                <td><?= esc($t['nama_pemohon']) ?></td>
                                <td><?= esc($t['jenis_layanan']) ?></td>
                                <td>
                                    <?php
                                        $status = strtolower($t['status']);
                                        $badgeClass = match($status) {
                                            'menunggu' => 'bg-warning text-dark',
                                            'diproses' => 'bg-info text-dark',
                                            'selesai'  => 'bg-success',
                                            'ditolak'  => 'bg-danger',
                                            default    => 'bg-secondary'
                                        };
                                    ?>
                                    <span class="badge <?= $badgeClass ?>"><?= ucfirst($status) ?></span>
                                </td>
                                <td><?= date('d M Y', strtotime($t['tanggal'])) ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('tiket/detail/' . $t['id_tiket']) ?>" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="text-center py-4">
                <i class="bi bi-info-circle text-primary fs-3"></i>
                <p class="mt-2 mb-3 text-muted">Belum ada tiket yang dibuat.</p>
                <a href="<?= base_url('tiket/buat') ?>" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Buat Tiket Sekarang
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
