<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\contract\ContractServicesActualmonth */

$this->title = 'Create Contract Services Actualmonth';
$this->params['breadcrumbs'][] = ['label' => 'Contract Services Actualmonths', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-services-actualmonth-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
