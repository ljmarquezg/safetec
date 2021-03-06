<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\contract\ContractServicesPeriod */

$this->title = 'Update Contract Services Period: ' . $model->id_contract_services_period;
$this->params['breadcrumbs'][] = ['label' => 'Contract Services Periods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_contract_services_period, 'url' => ['view', 'id' => $model->id_contract_services_period]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contract-services-period-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
