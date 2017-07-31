<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\contract\ContractStatus */

$this->title = 'Update Contract Status: ' . $model->id_contract_status;
$this->params['breadcrumbs'][] = ['label' => 'Contract Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_contract_status, 'url' => ['view', 'id' => $model->id_contract_status]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contract-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
