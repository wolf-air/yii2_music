<?php
    use yii\helpers\Html;
?>
<div class="site-index">

    <div class="body-content">

        <strong>Жанры</strong>

        <ul style="list-style: none;padding: 0;">
            <?php foreach ( $genres as $genre ) {
                echo "<li>" . Html::a($genre->name, ['site/genre', 'id' => $genre->id]) . "</li>";
            }
            ?>
        </ul>

    </div>
</div>
