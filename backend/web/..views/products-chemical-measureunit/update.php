<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\products\ProductsMeasureunit */

$this->title = 'Update Products Measureunit: ' . $model->id_product_measure_unit;
$this->params['breadcrumbs'][] = ['label' => 'Products Measureunits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_product_measure_unit, 'url' => ['view', 'id' => $model->id_product_measure_unit]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="products-measureunit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
