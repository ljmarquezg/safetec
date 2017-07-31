<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\contract\ContractServicesStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contract Services Statuses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-services-status-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Contract Services Status', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_contract_services_status',
            'contract_services_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
