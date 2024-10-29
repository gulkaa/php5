<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Практическая 5</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Каталог товаров</h1>
    <a href="addtovar.php" class="aaa">Добавить товары</a>
    <a href="index.php" class="aaa">Вернутся на главную</a>
    <form method="GET" action="">
        <input type="text" name="search" placeholder="Поиск товара">
        <input type="submit" class="aa" value="Поиск">
        <select name="category_filter">
            <option value="">Все категории</option>
            <option value="Хлебобулочные">Хлебобулочные</option>
            <option value="Молочные продукты">Молочные продукты</option>
            <option value="Морепродукты">Морепродукты</option>
        </select>
        <input type="submit" class="aa" value="Фильтровать">
    </form>

    <table class="table">
        <tr>
            <th>Название</th>
            <th>Описание</th>
            <th>Цена</th>
            <th>Категория</th>
        </tr>
        <?php
        include 'db.php';
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $category_filter = isset($_GET['category_filter']) ? $_GET['category_filter'] : '';

        $query = "SELECT * FROM products WHERE name LIKE ?";

        if (!empty($category_filter)) {
            $query .= " AND category = ?";
        }

        $stmt = $mysqli->prepare($query);
        $search_param = "%" . $search . "%";
        if (!empty($category_filter)) {
            $stmt->bind_param('ss', $search_param, $category_filter);
        } else {
            $stmt->bind_param('s', $search_param);
        }
        
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['description']}</td>
                <td>{$row['price']}</td>
                <td>{$row['category']}</td>
            </tr>";
        }

        $stmt->close();
        ?>
    </table>

</body>
</html>