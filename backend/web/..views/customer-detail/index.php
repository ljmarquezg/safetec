<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\customer\CustomerDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Customer Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_customer_detail',
            'id_customer',
            'id_customer_branch',
            'id_customer_detail_type',
            'customer_detail_value',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
