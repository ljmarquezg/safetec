<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\contract\ContractPeriod */

$this->title = 'Update Contract Period: ' . $model->id_contract_period;
$this->params['breadcrumbs'][] = ['label' => 'Contract Periods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_contract_period, 'url' => ['view', 'id' => $model->id_contract_period]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contract-period-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
