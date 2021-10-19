<!-- 1. Создать галерею фотографий. Она должна состоять всего из одной странички, на которой 
пользователь видит все картинки в уменьшенном виде и форму для загрузки нового изображения. 
При клике на фотографию она должна открыться в браузере в новой вкладке. Размер картинок можно 
ограничивать с помощью свойства width. При загрузке изображения необходимо делать проверку 
на тип и размер файла. -->

<html>
<head>
</head>
<body>
    <a href="/images/1.jpg" target="_blank" style="text-decoration: none"> <img src="/images/1.jpg" alt ="smile1" width=50> </a>
    <a href="/images/2.jpg" target="_blank" style="text-decoration: none"> <img src="/images/2.jpg" alt ="smile2" width=50> </a>
    <a href="/images/3.jpg" target="_blank" style="text-decoration: none"> <img src="/images/3.jpg" alt ="smile3" width=50> </a>
    <a href="/images/4.jpg" target="_blank" style="text-decoration: none"> <img src="/images/4.jpg" alt ="smile4" width=50> </a>
    <a href="/images/5.jpg" target="_blank" style="text-decoration: none"> <img src="/images/5.jpg" alt ="smile5" width=50> </a>

<form enctype="multipart/form-data" action="/index.php" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
    <input name="userfile" type="file" />
    <input type="submit" value="Отправить файл" />
</form>

<?php

echo '<pre>';
$allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
$fileInfo = finfo_open(FILEINFO_MIME_TYPE);
$fileSize = filesize($_FILES['userfile']['tmp_name']);

$detectedType = finfo_file($fileInfo, $_FILES['userfile']['tmp_name']);
if (!in_array($detectedType, $allowedTypes)) {
    echo 'Картинка должна быть в формате jpeg/png/jpg/gif';
    if($fileSize > 1000000) {
        echo '<br>Размер картинки должен быть не более 2 МБ!';
    }
    
} else {
    echo 'Файл успешно загружен!';
}

finfo_close( $fileInfo );
print "</pre>";

?>

</body>
</html>

<!-- 2. *Строить фотогалерею, не указывая статичные ссылки к файлам, а просто 
передавая в функцию построения адрес папки с изображениями. Функция сама должна 
считать список файлов и построить фотогалерею со ссылками в ней. -->

<html>
<head></head>
<main></main>
<body>
    <hr>
    <?php
    $images = scandir('images/');
    foreach($images as $image) {
        if(is_file('images/' . $image)) {
            ?>
            <a href="/images/<?php echo $image?>" target="_blank"><img src="/images/<?php echo $image?>" alt="smile" width=65></a>
        <?php
        }
    }
    ?>
</body>
</html>


