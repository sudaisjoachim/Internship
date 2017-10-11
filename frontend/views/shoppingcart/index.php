<?php
namespace  frontend\models\Product;
use yii\helpers\Html;
use yii\grid\GridView;


$this->title = 'Shoppingcarts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shoppingcart-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Shoppingcart', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'shoppingcart_id',
            'customer_id',
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<?php

?>
<!--<h1>Your cart</h1>-->
<!---->
<!--<div class="container-fluid">-->
<!--    <div class="row">-->
<!--        <div class="col-xs-4">-->
<!---->
<!--        </div>-->
<!--        <div class="col-xs-2">-->
<!--            Price-->
<!--        </div>-->
<!--        <div class="col-xs-2">-->
<!--            Quantity-->
<!--        </div>-->
<!--        <div class="col-xs-2">-->
<!--            Cost-->
<!--        </div>-->
<!--        <div class="col-xs-2">-->
<!---->
<!--        </div>-->
<!--    </div>-->
<!--    --><?php //foreach ($products as $product):?>
<!--        <div class="row">-->
<!--            <div class="col-xs-4">-->
<!--                --><?//= Html::encode($product->product_name) ?>
<!--            </div>-->
<!--            <div class="col-xs-2">-->
<!--                $--><?//= $product->price ?>
<!--            </div>-->
<!--            <div class="col-xs-2">-->
<!--<!--                -->--><?////= $quantity = $product->getQuantity()?>
<!---->
<!--<!--                -->--><?////= Html::a('-', ['cart/update', 'id' => $product->getId(), 'quantity' => $quantity - 1], ['class' => 'btn btn-danger', 'disabled' => ($quantity - 1) < 1])?>
<!--<!--                -->--><?////= Html::a('+', ['cart/update', 'id' => $product->getId(), 'quantity' => $quantity + 1], ['class' => 'btn btn-success'])?>
<!--            </div>-->
<!--            <div class="col-xs-2">-->
<!--<!--                $-->--><?////= $product->getCost() ?>
<!--            </div>-->
<!--            <div class="col-xs-2">-->
<!--<!--                -->--><?////= Html::a('×', ['cart/remove', 'id' => $product->getId()], ['class' => 'btn btn-danger'])?>
<!--            </div>-->
<!--        </div>-->
<!--    --><?php //endforeach ?>
<!--    <div class="row">-->
<!--        <div class="col-xs-8">-->
<!---->
<!--        </div>-->
<!--        <div class="col-xs-2">-->
<!--            Total:-->
<!--<!--            $-->-->--><?//////= $total ?>
<!--        </div>-->
<!--        <div class="col-xs-2">-->
<!--            --><?//= Html::a('Order', ['cart/order'], ['class' => 'btn btn-success'])?>
<!--        </div>-->
<!--    </div>-->
</div>