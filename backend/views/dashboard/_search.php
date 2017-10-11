<?php
namespace common\models;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii;


?>

<div class="shop-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'shop_owner_id') ?>

    <?= $form->field($model, 'shop_name') ?>

    <?= $form->field($model, 'shop_number') ?>

    <?= $form->field($model, 'shop_owner_names') ?>

    <?= $form->field($model, 'shop_address') ?>

    <?= $form->field($model, 'shop_email') ?>

    <?= $form->field($model, 'shop_phone') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
