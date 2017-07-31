<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\products\ProductsBranch */

$this->title = $model->id_products_brand;
$this->params['breadcrumbs'][] = ['label' => 'Products Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-branch-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_products_brand], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_products_brand], [
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
            'id_products_brand',
            'products_brand_description',
            'product_brand_status',
        ],
    ]) ?>

</div>
