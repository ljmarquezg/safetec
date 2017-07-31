<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\attendance\AttendanceType */

$this->title = 'Update Attendance Type: ' . $model->id_attendandce_type;
$this->params['breadcrumbs'][] = ['label' => 'Attendance Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_attendandce_type, 'url' => ['view', 'id' => $model->id_attendandce_type]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="attendance-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
