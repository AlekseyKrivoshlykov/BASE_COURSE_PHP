<?php
require_once('db_connect.php');

$id = $_GET['image_id'] ?? null;
if ($id && is_numeric($id)) {
    mysqli_query($connect, 'UPDATE images SET is_viewed=is_viewed + 1 WHERE id=' . $id);
    $result = mysqli_query($connect, 'SELECT * FROM images WHERE id = '. $id);
    $image = mysqli_fetch_assoc($result);
    if ($image) {
        echo '<img src="' . $image['image_path'] . '">';
        echo '<br><span>Количество просмотров: '. $image['is_viewed'] . '</span>';
    }
}

$closeConnect = mysqli_close($connect);

?>