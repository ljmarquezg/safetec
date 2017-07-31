<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\contract\ContractSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contracts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Contract', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_contract',
            'id_customer',
            'id_customer_branch',
            'contract_number',
            'created_date',
            'updated_date',
            // 'contract_expire',
            // 'contract_information',
            // 'id_contract_period',
            // 'id_contract_status',
            // 'created_date',
            // 'purchace_order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
