<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\StringHelper;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ReceitaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Receitas';
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
    <div class="scroll">
        <div class="fundoBranco">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'options' => ['style' => 'table-layout:fixed;'],
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
                    ['header' => 'Categoria', 'attribute' => 'categoria.nome',
                        'headerOptions' => ['style' => 'color:#3277b3'],
                        'contentOptions' => ['style' => 'max-width: 100px;'],
                        ],
                    ['class' => 'yii\grid\ActionColumn',
                        'header' => "Ver",
                        'headerOptions' => [
                            'style' => 'color:#3277b3'
                        ],
                        'template' => '{view}',
                        'buttonOptions' => ['title' => 'abrir'],

                        'contentOptions' => ['style' => 'max-width: 100px;'],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
