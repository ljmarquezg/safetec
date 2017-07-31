<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\customer\CustomerStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer Statuses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-status-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Customer Status', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_status',
            'status_description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
