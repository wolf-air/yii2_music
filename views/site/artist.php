<?php
use yii\helpers\Html;
?>
<div class="site-index">

    <div class="body-content">

        <div><strong>Исполнитель: </strong><?= $artist->name; ?> <span style="color: grey;font-size: 12px;">(жанр:
            <?php foreach ( $artist->genres as $ind => $genre ) {
                if($ind > 0) echo ', ';
                echo $genre->name;
            }
            ?>)</span></div>
        <br>
        <strong>Альбомы</strong>
        <br>
        <ul style="list-style: none;padding: 0;">
            <?php foreach ( $artist->albums as $album ) {
                echo "<li>" . Html::a($album->name, ['site/album', 'id' => $album->id]) . "</li>";
            }
            ?>
        </ul>

    </div>
</div>