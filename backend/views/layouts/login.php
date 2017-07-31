<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <!--link rel="stylesheet"  type="text/css" href="css/font-awesome.css">

    <link rel="stylesheet"  type="text/css" href="css/bootstrap/css/bootstrap.min.css'">

    <link rel="stylesheet"  type="text/css" href="css/bootstrap-datepicker3.css">

    <link rel="stylesheet"  type="text/css" href="css/bootstrap-select.min.css">
    
    <link rel="stylesheet"  type="text/css" href="css/toggle-switch.css">

    <link rel="stylesheet"  type="text/css" href="css/inputforms.css">

    <link rel="stylesheet"  type="text/css" href="css/menu.css">
    
    <link rel="stylesheet"  type="text/css" href="css/style.css">
    <link rel="stylesheet"  type="text/css" href="css/gridview.css"-->

</head>
<body>
    <?php $this->beginBody() ?>



    <div class="wrap">
        
        <div class="container">
            <?php /*<?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>*/?>
                <?= Alert::widget() ?>
                
            </div>
            <?= $content ?>
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
