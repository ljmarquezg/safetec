<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\contract\ContractPeriod */

$this->title = 'Create Contract Period';
$this->params['breadcrumbs'][] = ['label' => 'Contract Periods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-period-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
