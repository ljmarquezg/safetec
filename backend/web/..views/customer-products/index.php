<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\customer\CustomerProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Customer Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_customer_product',
            'id_customer',
            'id_customer_branch',
            'id_products',
            'serial_number',
            // 'id_products_status',
            // 'last_t_date',
            // 'retest',
            // 'hydrotest',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
