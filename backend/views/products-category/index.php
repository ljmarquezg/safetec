<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\products\ProductsCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Products Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_products_category',
            'products_category_description',
            'product_category_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
