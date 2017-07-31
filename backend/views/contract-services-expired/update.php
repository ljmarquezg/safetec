<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\contract\ContractServicesExpired */

$this->title = 'Update Contract Services Expired: ' . $model->id_contract_services;
$this->params['breadcrumbs'][] = ['label' => 'Contract Services Expireds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_contract_services, 'url' => ['view', 'id' => $model->id_contract_services]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contract-services-expired-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
