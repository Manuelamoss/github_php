<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\StringHelper;
use yii\bootstrap\Alert;
use common\models\ReceitaSearch;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ReceitaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Receitas';
//$this->params['breadcrumbs'][] = $this->title;
?>
<?php if ($flag == 0) {
    echo Alert::widget([
        'options' => [
            'class' => 'alert-danger',
        ],
        'body' => $mensagemErro,
    ]);
}
?>
<div class="receita-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="receita-create">

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
                [   //é exibido os primeiros 100 caracteres
                    'attribute' => 'descricao_preparo',
                    'value' => function ($model, $key, $index, $column) {
                        return StringHelper::truncate($model->descricao_preparo, 100);
                    },
                    'format' => 'ntext',
                ],
                'tempo_preparo',
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
</div>
