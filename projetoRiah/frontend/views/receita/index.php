<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Receitas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receita-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Receita', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <!--TODO: fazer 3 campos de pesquisa que busque dentro do campo descrição_preparo-->
    <div class="receita-create">

        <h1>Pesquisa de receitas</h1>
        <p> Escreva nos campos ao menos 1 ingrediente para a pesquisa.</p>

        <?= $this->render('_search', [
            'model' => $searchModel,
        ]) ?>



    </div>
    <div class="fundogrid">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => [ 'style' => 'table-layout:fixed;' ],
        //'filterModel' => $searchModel,
        'columns' => [

            //'id',
            'nome',
            /*'tempo_preparo',
            'descricao_preparo:ntext',
            ['header'=>'Categoria','attribute'=>'categoria.nome',
                'headerOptions'=>['style'=>'color:#3277b3']],*/

            //['class' => 'yii\grid\ActionColumn'],

            ['class' => 'yii\grid\ActionColumn',
                'header'=>"Ações",
                'headerOptions' => [
                    'style' => 'color:#3277b3'
                ],
                'template' => '{view}',
                'visibleButtons' => [
                    'view' => function ($model) {
                        $url = Url::to(['receita/index' ]);
                        return Html::a('view', $url, ['class' => 'btn btn-info'] );
                    },
                ],
            ],
        ],
    ]); ?>
    </div>

    <?php  ?>
</div>
