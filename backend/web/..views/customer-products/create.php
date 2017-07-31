<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\customer\CustomerProducts */

$this->title = 'Create Customer Products';
$this->params['breadcrumbs'][] = ['label' => 'Customer Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
