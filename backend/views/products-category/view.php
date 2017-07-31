<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\products\ProductsCategory */

$this->title = $model->id_products_category;
$this->params['breadcrumbs'][] = ['label' => 'Products Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_products_category], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_products_category], [
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
            'id_products_category',
            'products_category_description',
            'product_category_status',
        ],
    ]) ?>

</div>
