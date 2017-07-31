<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\contract\ContractStatusController */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contract Statuses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-status-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Contract Status', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_contract_status',
            'contract_status',
            'contract_steps',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
