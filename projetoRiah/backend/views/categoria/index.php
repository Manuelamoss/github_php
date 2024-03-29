<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <div class="fundoTitulo" align="center">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <p align="center">
        <?= Html::a('Criar Categoria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="fundoBranco">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['header' => 'id',
                    'headerOptions' => ['style' => 'color:#3277b3'],
                    'value' => 'id',
                    'contentOptions' => ['style' => 'max-width: 100px;']],
                'nome',

                ['class' => 'yii\grid\ActionColumn',
                    'header' => "Ações",
                    'headerOptions' => [
                        'style' => 'color:#3277b3',
                    ],
                    'template' => '{update} {delete}',
                ],
            ],
        ]); ?>
    </div>
    <br>
    <?= Html::a('voltar', ['site/index'], ['class' => 'btn btn-primary']) ?>
</div>
