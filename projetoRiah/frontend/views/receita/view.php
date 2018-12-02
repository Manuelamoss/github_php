<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model common\models\Receita */

$this->title = $model->nome;
//$this->params['breadcrumbs'][] = ['label' => 'Receitas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receita-view">

    <div class="fundoTitulo" align="center">
        <h1><?= Html::encode($this->title) ?></h1>

        <?php
        echo Html::label($model->curtir);
        echo "&nbsp; &nbsp;";

        if (empty($like)) {
            echo Html::a(Html::img('css/imagens/like.png', ['title' => 'like', 'width' => '20px', 'height' => '20px']), ['receita/curtidas', 'receita_id' => $model->id, 'like' => 1]);
        } else {
            echo Html::a(Html::img('css/imagens/like_black.png', ['title' => 'like', 'width' => '20px', 'height' => '20px']), ['receita/curtidas', 'receita_id' => $model->id, 'like' => 1]);
        } ?>
        &nbsp;
        <?php echo Html::label($model->descurtir);
        echo "&nbsp; &nbsp;";
        if (empty($dislike)) {
            echo Html::a(Html::img('css/imagens/dislike.png', ['title' => 'like', 'width' => '20px', 'height' => '20px']), ['receita/curtidas', 'receita_id' => $model->id, 'like' => -1]);

        } else {
            echo Html::a(Html::img('css/imagens/dislike_black.png', ['title' => 'like', 'width' => '20px', 'height' => '20px']), ['receita/curtidas', 'receita_id' => $model->id, 'like' => -1]);
        } ?>

    </div>

    <p>
        <?php // Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php /* Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */ ?>
    </p>

</div>

<div class="fundoBranco">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'nome',
            'tempo_preparo',
            'descricao_preparo:ntext',
            //'id_categoria',
            //'curtir',
            //'descurtir',
        ],
    ]) ?>

</div>
<br>
<div>
    <?= Html::a('voltar', ['receita/index',], ['class' => 'btn btn-primary']) ?>
</div>
<br>
<div class="fundoBranco">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'descricao:ntext',
            //'id_receita',
            ['header' => 'Utilizador', 'attribute' => 'user.username',
                'headerOptions' => ['style' => 'color:#3277b3']
            ],
            ['class' => 'yii\grid\ActionColumn',
                'header' => "Ações",
                'headerOptions' => [
                    'style' => 'color:#3277b3'
                ],
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>
</div>
