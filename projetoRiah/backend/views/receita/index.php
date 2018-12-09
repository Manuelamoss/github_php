<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\StringHelper;
use yii\helpers\ArrayHelper;
use common\models\CategoriaSearch;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ReceitaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Receitas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receita-index">

    <div class="fundoTitulo" align="center">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p align="center">
        <?= Html::a('Criar Receita', ['create'], ['class' => 'btn btn-success']) ?>
    <p>

    <div class="fundoBranco">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'options' => ['style' => 'table-layout:fixed;'],

            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],

                ['header' => 'id',
                    'headerOptions' => ['style' => 'color:#3277b3'],
                    'value' => 'id',
                    'contentOptions' => ['style' => 'max-width: 100px;'],
                ],

                ['header' => 'Nome', 'attribute' => 'nome',
                    'headerOptions' => ['style' => 'color:#3277b3'],
                    'contentOptions' => ['style' => 'max-width: 100px;']
                ],

                ['header' => 'Tempo de preparo', 'attribute' => 'tempo_preparo',
                    'headerOptions' => ['style' => 'color:#3277b3'],
                    'contentOptions' => ['style' => 'max-width: 100px;']
                ],

                [   //é exibido os primeiros 100 caracteres
                    'attribute' => 'descricao_preparo',
                    'value' => function ($model) {
                        return StringHelper::truncate($model->descricao_preparo, 100);
                    },
                    'format' => 'ntext',
                ],
                // todo: colocar campo de pesquisa na coluna categoria

                ['header' => 'Categoria', 'attribute' => 'categoria.nome',
                    'headerOptions' => ['style' => 'color:#3277b3'],
                    'contentOptions' => ['style' => 'max-width: 100px;'],
                    'filter'=>Html::activeDropDownList($searchModel, 'id', ArrayHelper::map(CategoriaSearch::find()->asArray()->all(), 'id', 'nome'),['class'=>'form-control','prompt' => 'Selecione Categoria']),

                ],

                ['class' => 'yii\grid\ActionColumn',
                    'header' => "Ações",
                    'headerOptions' => [
                        'style' => 'color:#3277b3'
                    ],
                ],
            ],
        ]); ?>
        </div>
    <br>
    <?= Html::a('voltar', ['site/index'], ['class' => 'btn btn-primary']) ?>
</div>