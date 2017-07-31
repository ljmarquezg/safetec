<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\services\ServicesControlDate */

$this->title = $model->id_service_control_date;
$this->params['breadcrumbs'][] = ['label' => 'Services Control Dates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-control-date-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_service_control_date], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_service_control_date], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_service_control_date',
            'id_contract_services',
            'service_control_date_start',
            'service_control_date_expire',
            'service_control_date_status',
            'created_date',
        ],
    ]) ?>

</div>
