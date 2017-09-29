<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'product_number')->textInput() ?>

    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Category::find()->all(),'category_id','category_name'),['prompt'=>'Select category'])?>

    <?=  $form->field($model,'shop_owner_id')->dropDownList( \yii\helpers\ArrayHelper::map(\app\models\Shop::find()->all(),'shop_owner_id','shop_owner_names'),['prompt'=>'Select product owner'] )?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
