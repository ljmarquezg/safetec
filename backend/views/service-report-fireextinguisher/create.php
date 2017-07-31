<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\services\ServiceReportFireextinguisher */

$this->title = 'Create Service Report Fireextinguisher';
$this->params['breadcrumbs'][] = ['label' => 'Service Report Fireextinguishers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-report-fireextinguisher-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
