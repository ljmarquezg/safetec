<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use backend\models\customer\Customer;

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

            //'id_customer_branch',
            [
                'attribute'=> 'id_customer',
                'value' => 'idCustomer.customer_name',
            ],
            //'id_customer',
            'customer_branch_name',
            'customer_branch_email:email',
            'customer_branch_phone',
            // 'customer_branch_address',
            // 'customer_branch_address2',
            // 'customer_branch_created',
            // 'id_customer_branch_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
