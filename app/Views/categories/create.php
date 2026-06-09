<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori</title>
</head>
<body>

<h2>Tambah Kategori</h2>

<form method="POST"
      action="/wcash/public/categories/store">

    <input type="text"
           name="name"
           placeholder="Nama kategori"
           required>

    <button type="submit">
        Simpan
    </button>

</form>

</body>
</html>