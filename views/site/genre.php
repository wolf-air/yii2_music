<?php
    use yii\helpers\Html;
?>
<div class="site-index">

    <div class="body-content">

        <div><strong>Жанр: </strong><?= $genre->name; ?></div>
        <br>
        <strong>Исполнители</strong>
        <br>
        <ul style="list-style: none;padding: 0;">
            <?php foreach ( $genre->artists as $artist ) {
                echo "<li>" . Html::a($artist['name'], ['site/artist', 'id' => $artist['id']]) . "</li>";
            }
            ?>
        </ul>

    </div>
</div>