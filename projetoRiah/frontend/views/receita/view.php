<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Receita */

$this->title = $model->nome;
//$this->params['breadcrumbs'][] = ['label' => 'Receitas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receita-view">

    <div class="fundoTitulo" align="center">
        <h1><?= Html::encode($this->title) ?></h1>
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
    <?= Html::a('voltar', ['receita/index','flag' => 1], ['class' => 'btn btn-primary']) ?>
</div>
