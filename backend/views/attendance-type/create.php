<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\attendance\AttendanceType */

$this->title = 'Create Attendance Type';
$this->params['breadcrumbs'][] = ['label' => 'Attendance Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attendance-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
