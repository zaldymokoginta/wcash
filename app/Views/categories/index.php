<?php require '../app/Views/layouts/header.php'; ?>

<?php require '../app/Views/layouts/sidebar.php'; ?>

<div class="container mt-4">

    <h2>Daftar Kategori</h2>

    <a href="/wcash/public/categories/create"
        class="btn btn-primary mb-3">
        Tambah Kategori
    </a>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($categories as $category): ?>

                <tr>

                    <td><?= $category['id'] ?></td>

                    <td><?= $category['name'] ?></td>

                    <td>

                        <a href="/wcash/public/categories/edit?id=<?= $category['id'] ?>"
                            class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <a href="/wcash/public/categories/delete?id=<?= $category['id'] ?>"
                            class="btn btn-danger btn-sm">
                            Delete
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>

<?php require '../app/Views/layouts/footer.php'; ?>