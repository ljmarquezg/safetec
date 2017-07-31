<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\services\ServicesControlDate */

$this->title = 'Create Services Control Date';
$this->params['breadcrumbs'][] = ['label' => 'Services Control Dates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-control-date-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
