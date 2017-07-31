<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\attendance\Attendance */

$this->title = 'Update Attendance: ' . $model->id_attendance;
$this->params['breadcrumbs'][] = ['label' => 'Attendances', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_attendance, 'url' => ['view', 'id' => $model->id_attendance]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="attendance-update">

    <!--h1><?= Html::encode($this->title) ?></h1-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
