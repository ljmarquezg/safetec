<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\products\ProductsStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products Statuses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-status-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Products Status', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_product_status',
            'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
