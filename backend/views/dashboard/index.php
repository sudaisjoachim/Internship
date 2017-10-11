
<?php

use common\models\Shop;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\modal;
use yii\widgets\Pjax;


$this->title = 'Shops';
$this->params['breadcrumbs'][] = $this->title;

?>

<!DOCTYPE html>
<html>

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
        <section class="col-xs-10 col-md-push-1">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a('Create Shop', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?php Pjax::begin();?>
            <?= GridView::widget([

            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
                'pager' => [
                    'firstPageLabel' => 'First',
                    'lastPageLabel'  => 'Last'
                ],

            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
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

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

            <?php  Pjax::end(); ?>
            </section>

        <!-- /.content -->
    </div>
        <!-- /.content-wrapper -->
</html>
