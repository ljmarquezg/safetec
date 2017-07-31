<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\contract\ContractServicesStatus */

$this->title = 'Create Contract Services Status';
$this->params['breadcrumbs'][] = ['label' => 'Contract Services Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-services-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
