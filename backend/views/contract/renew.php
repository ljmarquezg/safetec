<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\contract\Contract */

$this->title = 'Create Contract';
$this->params['breadcrumbs'][] = ['label' => 'Contracts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-renew">

    <!--h1><?= Html::encode($this->title) ?></h1-->
    <?php $model->id_contract_status = 1?>
    <?php echo 'Customer id: '. $model->id_customer?>
    <?= $this->render('_formrenew', [
        'model' => $model,
    ]) ?>

</div>
