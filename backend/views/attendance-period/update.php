<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\attendance\AttendancePeriod */

$this->title = 'Update Attendance Period: ' . $model->id_attendance_period;
$this->params['breadcrumbs'][] = ['label' => 'Attendance Periods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_attendance_period, 'url' => ['view', 'id' => $model->id_attendance_period]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="attendance-period-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
