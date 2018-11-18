<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Utilizadores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <div class="fundoTitulo" align="center">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    <!--Admin não cria uilizadores
    <p align="center">
        <?php Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->

    <div class="fundoBranco">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'options' => ['style' => 'table-layout:fixed;'],
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],

                'id',
                'username',
                //'auth_key',
                //'password_hash',
                //'password_reset_token',
                //'email:email',
                //'status',
                //'created_at',
                //'updated_at',

                ['class' => 'yii\grid\ActionColumn',
                    'header' => "Ações",
                    'headerOptions' => [
                        'style' => 'color:#3277b3'
                    ],
                    'template' => '{view} {update}']

            ],
        ]); ?>
    </div>
</div>
