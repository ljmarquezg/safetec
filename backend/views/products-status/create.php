<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\products\ProductsStatus */

$this->title = 'Create Products Status';
$this->params['breadcrumbs'][] = ['label' => 'Products Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
