<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\customer\CustomerBranch */

$this->title = 'Update Customer Branch: ' . $model->id_customer_branch;
$this->params['breadcrumbs'][] = ['label' => 'Customer Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_customer_branch, 'url' => ['view', 'id' => $model->id_customer_branch]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customer-branch-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
