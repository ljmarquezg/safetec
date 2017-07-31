<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\services\ServiceReportFireextinguisherdetail */

$this->title = 'Create Service Report Fireextinguisherdetail';
$this->params['breadcrumbs'][] = ['label' => 'Service Report Fireextinguisherdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-report-fireextinguisherdetail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
