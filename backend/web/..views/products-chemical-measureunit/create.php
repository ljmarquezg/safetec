<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\products\ProductsMeasureunit */

$this->title = 'Create Products Measureunit';
$this->params['breadcrumbs'][] = ['label' => 'Products Measureunits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-measureunit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
