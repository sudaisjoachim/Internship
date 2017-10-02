<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ShopSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shops';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Shop', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'shop_owner_id',
            'shop_name',
            'shop_number',
            'shop_owner_names',
            'shop_address',
            'shop_email:email',
            //'shop_phone',
            //'description',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
