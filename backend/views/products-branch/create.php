<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\products\ProductsBranch */

$this->title = 'Create Products Branch';
$this->params['breadcrumbs'][] = ['label' => 'Products Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-branch-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
