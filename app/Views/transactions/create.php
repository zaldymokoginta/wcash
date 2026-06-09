<!DOCTYPE html>
<html>
<head>
    <title>Tambah Transaksi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Tambah Transaksi</h2>

    <form method="POST"
          action="/wcash/public/transactions/store">

        <div class="mb-3">

            <label>Kategori</label>

            <select
                name="category_id"
                class="form-control"
                required>

                <?php foreach ($categories as $category): ?>

                <option value="<?= $category['id'] ?>">
                    <?= $category['name'] ?>
                </option>

                <?php endforeach; ?>

            </select>

        </div>

        <div class="mb-3">

            <label>Jenis</label>

            <select
                name="type"
                class="form-control">

                <option value="income">
                    Pemasukan
                </option>

                <option value="expense">
                    Pengeluaran
                </option>

            </select>

        </div>

        <div class="mb-3">

            <label>Nominal</label>

            <input
                type="number"
                name="amount"
                class="form-control"
                required>

        </div>

        <div class="mb-3">

            <label>Tanggal</label>

            <input
                type="date"
                name="transaction_date"
                class="form-control"
                required>

        </div>

        <div class="mb-3">

            <label>Keterangan</label>

            <textarea
                name="description"
                class="form-control"></textarea>

        </div>

        <button
            type="submit"
            class="btn btn-success">

            Simpan

        </button>

    </form>

</div>

</body>
</html>