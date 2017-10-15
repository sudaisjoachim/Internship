<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use Yii\helpers\ArrayHelper;
use common\models\Location;
use kartik\select2\select2;
use  yii\helpers\Json;

/* @var $this yii\web\View */
/* @var $model common\models\Companies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="companies-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zipCode')->widget(Select2::classname(),['data'=>ArrayHelper::map(Location::find()->all(),'id','zipCode'),
        'language'=>'en',
        'options'=>['placeholder'=>'Select zip code','id'=>'zipCode'],
        'pluginOptions'=>[
            'allowClear'=>true
        ],

    ]); ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$script = <<< JS
//your java script here ! i need to check it agin doeas not provide city and state after selecting zipcode

$('#zipCode').change(function() {
    
    var zipId = $(this).val();

    $.get('index.php?r=location/get-city-province',{ zipId : zipId }, function(data) {
      
        var data1 = $.parseJSON(data);
        
        alert(data1.city);
        $('#companies-city').attr('value',data1.city);
        $('#companies-state').attr('value',data1.state);
     
    });
});

JS;

$this->registerJs($script);
?>