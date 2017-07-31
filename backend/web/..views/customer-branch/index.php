<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\customer\CustomerBranchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer Branches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-branch-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Customer Branch', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_customer_branch',
            'id_customer',
            'division_name',
            'division_address',
            'division_address2',
            // 'division_created',
            // 'id_customer_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
