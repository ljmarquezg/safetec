<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\employees\Employees */

$this->title = 'Create Employees';
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-create">

    <!--h1><?= Html::encode($this->title) ?></h1-->
    <?php $model->employees_status = 1 ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
        <script type="text/javascript">
    	$('.onoffswitch-checkbox').val('1');
    	$('.onoffswitch-checkbox').attr('checked', 'checked');
    </script>