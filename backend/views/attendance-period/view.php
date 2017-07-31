<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\attendance\AttendancePeriod */

$this->title = $model->id_attendance_period;
$this->params['breadcrumbs'][] = ['label' => 'Attendance Periods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attendance-period-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_attendance_period], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_attendance_period], [
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
            'id_attendance_period',
            'id_employees',
            'vacations',
            'sickLeave',
            'casual',
            'breavement',
            'start_period',
            'end_period',
            'created_date',
        ],
    ]) ?>

</div>
