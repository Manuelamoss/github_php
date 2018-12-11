<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;



/* @var $this yii\web\View */
/* @var $model common\models\Receita */



$this->title = $model->nome;
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
<br>
<br>
</div>

<div class="fundoBranco">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tempo_preparo',
            'descricao_preparo:ntext',
        ],
    ]) ?>

</div>
<br>
<div>
    <?= Html::a('voltar', ['receita/index',], ['class' => 'btn btn-primary']) ?>
</div>
<br>
<p>

    <?= Html::a('Comentar', ['comentario/create', 'id_receita' => $model->id], ['class' => 'btn btn-success']) ?>
</p>



    <?=
    ListView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'tag' => 'div',
            'class' => 'list-wrapper',
            'id' => 'list-wrapper',
        ],
        'layout' => "{pager}\n{items}\n{summary}",
        'itemView' => '_lista_Comentario',

    ]);
    ?>


