<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Admin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'admin_username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_names')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
