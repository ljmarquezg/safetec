<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\model\User;
use backend\model\Employees;
/* @var $this yii\web\View */
/* @var $model backend\models\user\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<div class="col-xs-12">
    <div class="box box-widget widget-user-2">
                <div class="widget-user-header bg-yellow">
                    <div class="widget-user-image">
                        <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
                    </div>
                    <h3 class="widget-user-username"><?php echo Yii::$app->user->identity->firstname. ' '. Yii::$app->user->identity->lastname; ?></h3>
                    <h5 class="widget-user-desc"><?php echo ucwords(Yii::$app->user->identity->getRoleName());?></h5>
                    <h5 class="widget-user-desc"><?php echo $model->email;?></h5>
                    <!--h5 class="widget-user-desc"><?php /*echo $modelEmployees->Employees_Phone;*/?></h5-->
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <li><a href="#">Pending Task <span class="pull-right badge bg-red">5</span></a></li>
                        <li><a href="#">Work Progress <span class="pull-right badge bg-blue">5</span></a></li>
                        <li><a href="#">Completed Projects <span class="pull-right badge bg-green">12</span></a></li>
                        <li>
                            <div class="box box-success direct-chat direct-chat-success collapsed-box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Detailed Completed Tasks</h3>
                                    <div class="box-tools pull-right">
                                        <span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="12 Completed Tasks">12</span>
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="box-body" style="display: none;">
                                    <div class="direct-chat-messages">
                                        <div class="direct-chat-msg">
                                            <div class="direct-chat-info clearfix">
                                                <span class="direct-chat-name pull-left">Oil Changed</span>
                                                <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                                            </div>
                                            <div class="direct-chat-info clearfix">
                                                <span class="direct-chat-name pull-left">Oil Changed</span>
                                                <span class="direct-chat-timestamp pull-right">23 Jan 2:10 pm</span>
                                            </div>
                                            <div class="direct-chat-info clearfix">
                                                <span class="direct-chat-name pull-left">Oil Changed</span>
                                                <span class="direct-chat-timestamp pull-right">23 Jan 2:20 pm</span>
                                            </div>
                                            <div class="direct-chat-info clearfix">
                                                <span class="direct-chat-name pull-left">Oil Changed</span>
                                                <span class="direct-chat-timestamp pull-right">23 Jan 2:30 pm</span>
                                            </div>
                                            <div class="direct-chat-info clearfix">
                                                <span class="direct-chat-name pull-left">Oil Changed</span>
                                                <span class="direct-chat-timestamp pull-right">23 Jan 2:40 pm</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
</div>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'firstname',
            'lastname',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
