
<?php

use common\models\Shop;
use yii\helpers\Html;
use yii\grid\GridView;

?>

<!DOCTYPE html>
<html>
<style>

    .button {

        display: block;
        width: 115px;
        height: 55px;
        background: #4E9CAF;
        padding: 8px;
        text-align: center;
        border-radius: 5px;
        color: snow;
        font-weight: bold;
    }

</style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 class="row">
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="http://y2aa-backend.dev/site/index"><i class="fa fa-dashboard"></i> Home </a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section> <!-- /.Content Header-->

        <!-- Main content -->
        <div class="overflow-y: hidden;">

        <section class="col-md-10 col-md">
                <?php
                $arr = new \common\models\Shop();
                // get shop names and their ids
                foreach( $arr->getShop() as $ar) {   ?>

                    <?= Html::a($ar['shop_name'], ['/product/show?'.$ar['shop_owner_id']], ['class'=>'button']) ?>
                    <br>

                <?php } ?>
        </section>
        </div>
        <!-- /.content -->
    </div>
        <!-- /.content-wrapper -->
</html>