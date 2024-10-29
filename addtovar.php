<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Практическая 5</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Добавить товар</h1>
    <form action="insert.php" method="POST" class="form">
        <label for="name">Название:</label>
        <input type="text" name="name" required><br>

        <label for="description">Описание:</label>
        <textarea name="description" required></textarea><br>

        <label for="price">Цена:</label>
        <input type="number" name="price" step="0.01" required><br>

        <label for="category">Категория:</label>
        <select name="category">
            <option value="Хлебобулочные">Хлебобулочные</option>
            <option value="Молочные продукты">Молочные продукты</option>
            <option value="Морепродукты">Морепродукты</option>
        </select><br>

        <input type="submit" class="aa" value="Добавить товар">
    </form>
</body>
</html>