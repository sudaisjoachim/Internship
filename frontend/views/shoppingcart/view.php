<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Shoppingcart */

$this->title = $model->shoppingcart_id;
$this->params['breadcrumbs'][] = ['label' => 'Shoppingcarts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shoppingcart-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->shoppingcart_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->shoppingcart_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'shoppingcart_id',
            'customer_id',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
