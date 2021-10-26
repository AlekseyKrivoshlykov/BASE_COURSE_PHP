<!-- 1. Создать форму-калькулятор с операциями: сложение, вычитание, умножение, деление. 
Не забыть обработать деление на ноль! 
Выбор операции можно осуществлять с помощью тега <select>. -->

<html>
    <header></header>
    <body>
        <form enctype="multypart/form-data" action="index.php" method="post">
            <input type="number" name="operand1">
            <input type="number" name="operand2">
            <select name="operation">
                <option value="sum">Сложение</option>
                <option value="subtraction">Вычитание</option>
                <option value="division">Деление</option>
                <option value="multiplication">Умножение</option>
            </select>
            <button type="submit" name="send">Выполнить</button>
        </form>
    </body>
</html>

<?php

    $operand1 = $_POST['operand1'];
    $operand2 = $_POST['operand2'];
    $operation = $_POST['operation'];
    
    switch ($operation) {
        case sum:
            echo $operand1 + $operand2;
            break;
        case subtraction:
            echo $operand1 - $operand2;
            break;
        case division:
            if($operand2 == 0) {
                echo 'На ноль делить нельзя! Введите корректное значение.';
            } else {
                echo $operand1 / $operand2;
            }
            break;
        case multiplication:
            echo  $operand1 * $operand2;
            break;
    };
  
?>

<!-- 2. Создать калькулятор, который будет определять тип 
выбранной пользователем операции, ориентируясь на нажатую кнопку. -->

<html>
    <header></header>
    <body>
        <hr>
        <form enctype="multypart/form-data" action="index.php" method="post">
            <input type="number" name="operand3">
            <input type="number" name="operand4">
            <button type="submit" name="operationTask2" value="sum">+</button>
            <button type="submit" name="operationTask2" value="subtraction">-</button>
            <button type="submit" name="operationTask2" value="division">:</button>
            <button type="submit" name="operationTask2" value="multiplication">*</button>
        </form>
    </body>
</html>

<?php

    $operand3 = $_POST['operand3'];
    $operand4 = $_POST['operand4'];
    $operationTask2 = $_POST['operationTask2'];
    
    switch ($operationTask2) {
        case sum:
            echo $operand3 + $operand4;
            break;
        case subtraction:
            echo $operand3 - $operand4;
            break;
        case division:
            if($operand4 == 0) {
                echo 'На ноль делить нельзя! Введите корректное значение.';
            } else {
                echo $operand3 / $operand4;
            }
            break;
        case multiplication:
            echo  $operand3 * $operand4;
            break;
    };
  echo '<hr>';
?>

<!-- 3. Добавить функционал отзывов в имеющийся у вас проект. 
Создать форму с отзывом, добавить запись отзыва в БД, 
добавить вывод отзывов из БД на страницу. -->

<html>
    <head></head>
    <body>
        <form action="index.php" method="post">
        <input type="text" name="userName" placeholder="Ваше Имя"><br>
        <input type="text" name="userLastName" placeholder="Ваша Фамилия"><br>
        <input type="text" name="header" placeholder="Тема отзыва"><br>
        <textarea name="review" cols="23" rows="5" placeholder="Введите Отзыв"></textarea><br>
        <button type="submit" name="send">Отправить отзыв</button>
        </form>
    </body>
</html>

<?php

$name = $_POST['userName'];
$lastName = $_POST['userLastName'];
$header = $_POST['header'];
$review = $_POST['review'];

$connect = mysqli_connect('localhost', 'root', 'root_MANUVA1', 'gb');
$sql_query = "INSERT INTO reviews (name, lastname, header, review) VALUES ('". $name ."', '" . $lastName . "', '" . $header . "', '" . $review . "')";
if(!empty($_POST)) {
    mysqli_query($connect, $sql_query);
    header('Location: index.php');
}
$result = mysqli_query($connect, 'SELECT * FROM reviews');

while ($row = mysqli_fetch_assoc($result)) {
    if($row) {
        echo '<span>Имя юзера: ' . $row['name'] . '</span><br>';
        echo '<span>Фамилия юзера: ' . $row['lastname'] . '</span><br>';
        echo '<span>Заголовок: ' . $row['header'] . '</span><br>';
        echo '<span>Отзыв: ' . $row['review'] . '</span><hr>';
    }
}

mysqli_close($connect);

?>
