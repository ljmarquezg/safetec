<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\services\ServicesType */

$this->title = 'Create Services Type';
$this->params['breadcrumbs'][] = ['label' => 'Services Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
