<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ClassificacaoReceitasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Classificacao Receitas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classificacao-receitas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Classificacao Receitas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_receitas',
            'id_classificacao',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
