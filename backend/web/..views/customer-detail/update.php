<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\customer\CustomerDetail */

$this->title = 'Update Customer Detail: ' . $model->id_customer_detail;
$this->params['breadcrumbs'][] = ['label' => 'Customer Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_customer_detail, 'url' => ['view', 'id' => $model->id_customer_detail]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customer-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
