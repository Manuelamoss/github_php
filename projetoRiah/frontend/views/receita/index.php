<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pesquisa por ingredientes';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receita-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--<p>
        <?php // Html::a('Create Receita', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->

    <!--TODO: fazer 3 campos de pesquisa que busque dentro do campo descrição_preparo-->
    <div class="receita-create">

        <h4> Escreva nos campos ao menos 1 ingrediente para a pesquisa.</h4>

        <?= $this->render('_search', [
            'model' => $searchModel,
        ]) ?>


    </div>
    <div class="fundoBranco">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'options' => ['style' => 'table-layout:fixed;'],
            //'filterModel' => $searchModel,
            'columns' => [
                'nome',

                ['class' => 'yii\grid\ActionColumn',
                    'header' => "Ver",
                    'headerOptions' => [
                        'style' => 'color:#3277b3'
                    ],
                    'template' => '{view}',
                    'contentOptions' => ['style' => 'max-width: 100px;'],

                ],
            ],
        ]); ?>
    </div>

    <?php ?>
</div>
