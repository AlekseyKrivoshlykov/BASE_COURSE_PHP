<!-- 1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. 
Затем написать скрипт, который работает по следующему принципу:
Если $a и $b положительные, вывести их разность.
Если $а и $b отрицательные, вывести их произведение.
Если $а и $b разных знаков, вывести их сумму.
 -->
<?php 

 $a = 1;
 $b = 3;

 function myFunction ($a, $b) {
    if($a >= 0 && $b >= 0) {
        return $a - $b;
    }
    else if($a < 0 && $b < 0) {
        return $a * $b;
    }
    else if(($a >= 0 && b < 0) || ($a < 0 && $b >= 0)) {
        return $a + $b;
    }
 }

 echo myFunction($a, $b);
 echo '<br>';
 echo myFunction(-4, -5);
 echo '<br>';
 echo myFunction(-3, 8);
 echo '<br>';
?>

 <!-- 2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора 
 switch организовать вывод чисел от $a до 15.  --> 

 <?php

 $a = 8;
 
 switch ($a) {
    case 0:
        echo 0;
        break;
    case 1:
        echo 1;
        break;
    case 2:
        echo 2;
        break;
    case 3:
        echo 3;
        break;
    case 4:
        echo 4;
        break;
    case 5:
        echo 5;
        break;
    case 6:
        echo 6;
        break;
    case 7:
        echo 7;
        break;
    case 8:
        echo 8;
    case 9:
        echo 9;
    case 10:
        echo 10;
    case 11:
        echo 11;
    case 12:
        echo 12;
    case 13:
        echo 13;
    case 14:
        echo 14;
    case 15:
        echo 15;
 }
 echo '<br>';
?>

<!-- 3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. 
Обязательно использовать оператор return.-->

<?php

function getSum ($a, $b) {
    return $a + $b;
}
function getSubtraction ($a, $b) {
    return $a - $b;
}
function getMultiplication ($a, $b) {
    return $a * $b;
}
function getDivision ($a, $b) {
    return $a / $b;
}
?>

<!-- 4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), 
где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. 
В зависимости от переданного значения операции выполнить одну из арифметических операций 
(использовать функции из пункта 3) и вернуть полученное значение (использовать switch). -->

<?php

function  mathOperation ($arg1, $arg2, $operation) {
    switch ($operation) {
        case getSum:
            return getSum($arg1, $arg2);
        case getSubtraction:
            return getSubtraction($arg1, $arg2);
        case getMultiplication:
            return getMultiplication($arg1, $arg2);
        case getDivision:
            return getDivision($arg1, $arg2);
    }
}

echo mathOperation(4, 3, getMultiplication);
echo mathOperation(1, 2, getSum);
echo mathOperation(5, 2, getSubtraction);
echo mathOperation(5, 1, getDivision);
?>

<!-- 5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML-шаблон, 
вывести текущий год в подвале при помощи встроенных функций PHP. -->

<?php

$date = date('Y-m-d');
?>
<html>
    <footer> <?php echo $date ?></footer>
</html>

<!-- 6. *С помощью рекурсии организовать функцию возведения числа в степень. 
Формат: function power($val, $pow), где $val – заданное число, $pow – степень. -->

<?php

function power ($val, $pow) {
    if($pow == 1) {
        return $val;
    } else { 
        return ($val * power($val, $pow - 1));
    }     
}

echo power(2, 3);
echo '<br>';
?>

<!-- 7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате 
с правильными склонениями, например:
22 часа 15 минут
21 час 43 минуты -->

<?php

$hours = date('H');
$minutes = date('i');

function getDeclination ($hours, $minutes) {
    $h = '';
    $m = '';

    switch (substr($hours, -1)) {
        case 1:
            $h = $hours . ' ' . 'час';  break;
        case 0: case 5: case 6: case 7: case 8: case 9:
            $h = $hours . ' ' . 'часов';  break;
        case 2: case 3: case 4:
            $h = $hours . ' ' . 'часа'; break;
    }
    switch (substr($minutes, -1)) {
        case 1:
            $m = $minutes . ' ' . 'минута'; break;
        case 0: case 5: case 6: case 7: case 8: case 9:
            $m = $minutes . ' ' . 'минут'; break;
        case 2: case 3: case 4:
            $m = $minutes . ' ' . 'минуты'; break;
    }
    return $h . ' ' . $m;
}

echo getDeclination($hours, $minutes);

?>
