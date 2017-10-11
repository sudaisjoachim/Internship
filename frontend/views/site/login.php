<?php
namespace frontend\models;
use Yii;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$this->title = 'Customer';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="login-box">
        <div class="login-logo">
            <h1><?= Html::encode($this->title) ?></h1>

        </div>

        <div class="login-box-body">
            <p class="login-box-msg">Please fill out the following fields tlogin:</p>

            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username',['options'=>['tag'=>'div','class'=>'form-group field-loginform-username has-feedback required '],'template'=>'{input}<span class="glyphicon glyphicon-user form-control-feedback"></span>{error}{hint}'])->textInput(['placeholder'=>'username']) ?>

            <?= $form->field($model, 'password',['options'=>['tag'=>'div','class'=>'form-group field-loginform-password has-feedback required '],'template'=>'{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>{error}{hint}'])->passwordInput(['placeholder'=>'password']) ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>

            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
            <div class="form-group">
<!--                <a href='/site/signup'><img  alt='Signup' class="btn btn-default btn-flat"></a>-->
            </div>

            <?php ActiveForm::end(); ?>
            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                    Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                    Google+</a>
            </div>
        </div>
    </div>
</div>
