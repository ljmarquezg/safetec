<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\customer\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Customer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_customer',
            'customer_name',
            'customer_address',
            'customer_address2',
            'customer_contact',
            // 'customer_country',
            // 'customer_state',
            // 'customer_zip',
            // 'customer_zone',
            // 'customer_created',
            // 'customer_phone',
            // 'customer_fax',
            // 'customer_email:email',
            // 'id_customer_status',
            // 'customer_logo:ntext',
            // 'customer_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
