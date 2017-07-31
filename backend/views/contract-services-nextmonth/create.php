<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\contract\ContractServicesNextmonth */

$this->title = 'Create Contract Services Nextmonth';
$this->params['breadcrumbs'][] = ['label' => 'Contract Services Nextmonths', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-services-nextmonth-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
