<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Shoppingcart */

$this->title = 'Update Shoppingcart: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Shoppingcarts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->shoppingcart_id, 'url' => ['view', 'id' => $model->shoppingcart_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shoppingcart-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
