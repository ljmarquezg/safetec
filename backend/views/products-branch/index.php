<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\products\ProductsBranchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products Branches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-branch-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Products Branch', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_products_brand',
            'products_brand_description',
            'product_brand_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
