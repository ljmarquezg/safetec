<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\contract\ContractServices */

$this->title = 'Update Contract Services: ' . $model->id_contract_service;
$this->params['breadcrumbs'][] = ['label' => 'Contract Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_contract_service, 'url' => ['view', 'id' => $model->id_contract_service]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contract-services-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
