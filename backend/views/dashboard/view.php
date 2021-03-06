<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->shop_owner_id;
$this->params['breadcrumbs'][] = ['label' => 'Shops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->shop_owner_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->shop_owner_id], [
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
            'shop_owner_id',
            'shop_name',
            'shop_number',
            'shop_owner_names',
            'shop_address',
            'shop_email:email',
            'shop_phone',
            'description',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
