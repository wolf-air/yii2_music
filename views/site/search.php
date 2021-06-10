<?php

use yii\helpers\Html;
?>

<?php if(!empty($artists)) { ?>
<strong>Исполнители</strong>
<br>
<ul style="list-style: none;padding: 0;">
    <?php foreach ( $artists as $artist ) {
        echo "<li>" . Html::a($artist['name'], ['site/artist', 'id' => $artist['id']]) . "<span style=\"color: grey;font-size: 12px;\">(жанр: " . implode(', ', $genres[$artist['id']]) . ")</span></li>";
    }
    ?>
</ul>
<?php } ?>
<?php if(!empty($albums)) { ?>
<br>
<strong>Альбомы</strong>
<br>
<ul style="list-style: none;padding: 0;">
    <?php foreach ( $albums as $album ) {
        echo "<li>" . Html::a($album['name'], ['site/album', 'id' => $album['id']]) . "<span style=\"color: grey;font - size: 12px;\">(${album['year']}, исполнитель: ${album['artist_name']})</span></li>";
    }
    ?>
</ul>
<?php } ?>
<?php if(!empty($tracks)) { ?>
<br>
<strong>Треки</strong>
<br>
<ul style="list-style: none;padding: 0;">
    <?php foreach ( $tracks as $track ) {
        echo "<li>${track['name']}<span style=\"color: grey;font-size: 12px;\"> (исполнитель: ${track['artist_name']}, альбом: ${track['album_name']})</span></li>";
    }
    ?>
</ul>
<?php } ?>