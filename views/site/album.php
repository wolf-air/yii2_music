<?php
use yii\helpers\Html;
?>
<div class="site-index">

    <div class="body-content">

        <div><strong>Исполнитель: </strong><?= $album->artist->name; ?><span style="color: grey;font-size: 12px;"> (жанр:
            <?php foreach ( $album->artist->genres as $ind => $genre ) {
                if($ind > 0) echo ', ';
                echo $genre->name;
            }
            ?>)</span></div>

        <div><strong>Альбом: </strong><?= $album->name; ?><span style="color: grey;font-size: 12px;"> (<?= $album->year; ?>)</span></div>
        <br>
        <strong>Треки</strong>
        <br>
        <ul style="list-style: none;padding: 0;">
            <?php foreach ( $album->tracks as $track ) {
                echo "<li>$track->name<span style=\"color: grey;font-size: 12px;\"> ($track->duration)</span></li>";
            }
            ?>
        </ul>

    </div>
</div>