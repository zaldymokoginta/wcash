<?php require '../app/Views/layouts/header.php'; ?>

<?php require '../app/Views/layouts/sidebar.php'; ?>



<div class="container mt-4">

    <h2>Daftar Transaksi</h2>

    <a href="/wcash/public/transactions/create"
        class="btn btn-primary mb-3">
        Tambah Transaksi
    </a>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Jenis</th>
                <th>Nominal</th>
                <th>Keterangan</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($transactions as $trx): ?>

                <tr>

                    <td><?= $trx['transaction_date'] ?></td>

                    <td><?= $trx['category_name'] ?></td>

                    <td><?= $trx['type'] ?></td>

                    <td>
                        Rp <?= number_format($trx['amount']) ?>
                    </td>

                    <td><?= $trx['description'] ?></td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>

<?php if (isset($_SESSION['success'])): ?>

    <div class="alert alert-success">

        <?= $_SESSION['success'] ?>

    </div>

    <?php unset($_SESSION['success']); ?>

<?php endif; ?>

<?php require '../app/Views/layouts/footer.php'; ?>