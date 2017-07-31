<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\contract\ContractServicesNextmonth */

$this->title = 'Update Contract Services Nextmonth: ' . $model->id_contract_services;
$this->params['breadcrumbs'][] = ['label' => 'Contract Services Nextmonths', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_contract_services, 'url' => ['view', 'id' => $model->id_contract_services]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contract-services-nextmonth-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
