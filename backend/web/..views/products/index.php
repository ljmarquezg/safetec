<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\products\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_products',
            'products_description',
            'id_products_measure_unit',
            'id_products_brand',
            'id_product_service',
            // 'id_products_category',
            // 'id_produdcts_status',
            // 'retest',
            // 'hydrotest',
            // 'products_capacity',
            // 'id_products_chemical',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
