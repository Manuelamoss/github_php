<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ReceitaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Receitas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receita-index">

    <div class="funtoTitulo" align="center">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    <p align="center">
        <?= Html::a('Create Receita', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="fundoBranco">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'options' => ['style' => 'table-layout:fixed;'],

            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'nome',
                'tempo_preparo',
                'descricao_preparo:ntext',
                ['header' => 'Categoria', 'attribute' => 'categoria.nome',
                    'headerOptions' => ['style' => 'color:#3277b3']],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
