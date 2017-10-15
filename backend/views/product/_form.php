<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Category;
use common\models\Shop;
use yii;
use yii\db\ActiveRecord;


/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */

//$UserTypeValue = Shop::find()->select(['shop_owner_id'])->where(['shop_owner_id' => Yii::$app->user->identity])->one();



?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'product_number')->textInput() ?>

    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->all(),'category_id','category_name'),['prompt'=>'Select category'])?>

<!--    $form->field($model,'shop_owner_id')->dropDownList(ArrayHelper::map(Shop::find()->all(),'shop_owner_id','shop_name'),['prompt'=>'Select shop name'] -->

    <?=  $form->field($model,'shop_owner_id')->textInput(['readonly' => true, 'value' =>'']) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

<!--     $form->field($model, 'product_image')->textInput(['maxlength' => true]) -->
    <?= $form->field($model, 'product_image')->fileInput() ?>

<!--     $form->field($model, 'created_at')->textInput() -->
<!---->
<!--     $form->field($model, 'updated_at')->textInput() -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
