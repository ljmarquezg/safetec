<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\contract\ContractServicesExpiredSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contract Services Expireds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-services-expired-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Contract Services Expired', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_contract_services',
            'id_contract',
            'id_contract_services_description',
            'last_service',
            'next_service',
            // 'qty',
            // 'description',
            // 'cost',
            // 'id_contract_services_period',
            // 'total',
            // 'contract_services_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
