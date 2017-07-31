<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\products\ProductsMeasureunit */

$this->title = $model->id_product_measure_unit;
$this->params['breadcrumbs'][] = ['label' => 'Products Measureunits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-measureunit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_product_measure_unit], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_product_measure_unit], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_product_measure_unit',
            'product_measure_unit_description',
        ],
    ]) ?>

</div>
