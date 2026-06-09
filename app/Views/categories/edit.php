<!DOCTYPE html>
<html>
<head>
    <title>Edit Kategori</title>
</head>
<body>

<h2>Edit Kategori</h2>

<form method="POST"
      action="/wcash/public/categories/update">

    <input type="hidden"
           name="id"
           value="<?= $category['id'] ?>">

    <input type="text"
           name="name"
           value="<?= $category['name'] ?>"
           required>

    <button type="submit">
        Update
    </button>

</form>

</body>
</html>