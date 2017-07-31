<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\customer\CustomerBranch */

$this->title = 'Update Customer Branch ID: ' . $model->id_customer_branch;
$this->params['breadcrumbs'][] = ['label' => 'Customer Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->customer_branch_name, 'url' => ['view', 'id' => $model->id_customer_branch]];
$this->params['breadcrumbs'][] = 'Update';
$customer_image =  Yii::$app->params['customer_image'];
?>
<div class="customer-branch-update">
    <?= $this->render('_form', [
        'model' => $model,
        'modelCustomer' =>$modelCustomer,
    ]) ?>

</div>
