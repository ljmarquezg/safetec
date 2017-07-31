<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\customer\CustomerStatus */

$this->title = 'Update Customer Status: ' . $model->id_status;
$this->params['breadcrumbs'][] = ['label' => 'Customer Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_status, 'url' => ['view', 'id' => $model->id_status]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customer-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
