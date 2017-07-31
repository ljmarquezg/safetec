<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\contract\ContractServicesRevisedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contract Services Reviseds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-services-revised-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Contract Services Revised', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
