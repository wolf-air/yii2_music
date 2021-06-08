<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="container">

        <div class="jumbotron">
            <h1>Моя музыка</h1>
        </div>

        <div class="search">
            <form action="<?= Url::to(['search']) ?>">
                <input type="text" value="<?= Html::encode(Yii::$app->request->get('search')); ?>" placeholder="Исполнитель, альбом, трек..." name="search" style="width: 100%;height: 40px;margin-bottom: 20px;">
            </form>
        </div>
        <script>
            window.addEventListener('submit', function(evt) {
                evt.preventDefault();
                var xhr = new XMLHttpRequest();

                xhr.open('GET', '<?= Url::to(['site/search']) ?>' + '&search=' + evt.target.querySelector('[name=search]').value, false);

                xhr.send();

                if (xhr.status != 200) {
                    console.log( xhr.status + ': ' + xhr.statusText );
                } else {
                    document.querySelector('.body-content').innerHTML = xhr.responseText;
                }

            });

        </script>

        <?= $content ?>


    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
