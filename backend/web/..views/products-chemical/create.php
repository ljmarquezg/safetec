<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\products\ProductsChemical */

$this->title = 'Create Products Chemical';
$this->params['breadcrumbs'][] = ['label' => 'Products Chemicals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-chemical-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
