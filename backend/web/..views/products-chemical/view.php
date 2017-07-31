<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\products\ProductsChemical */

$this->title = $model->id_products_chemical;
$this->params['breadcrumbs'][] = ['label' => 'Products Chemicals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-chemical-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_products_chemical], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_products_chemical], [
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
            'id_products_chemical',
            'products_chemical_description',
        ],
    ]) ?>

</div>
