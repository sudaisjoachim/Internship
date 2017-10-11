<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
namespace backend\models;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Category;
use common\models\Shop;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model,'firstname')->textInput()?>

                <?= $form->field($model,'lastname')->textInput()?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                 <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'ref_shop_id')->dropDownList(ArrayHelper::map(Shop::find()->all(),'shop_owner_id','shop_name'),['prompt'=>'Select shop phone number'])?>

                <?= $form->field($model, 'role')->dropDownList(['admin'=>'Admin','shopuser'=>'Shop user'],['prompt'=>'select role']) ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
