<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Receita */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Receitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receita-view">
    <div class="fundoTitulo" align="center">
        <h1>Receita: <?= Html::encode($this->title) ?></h1>
    </div>

    <p align="center">
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    <p>


    <div class="fundoBranco">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'nome',
                'tempo_preparo',
                'descricao_preparo:ntext',
                'id_categoria',
                'curtir',
                'descurtir',
            ],
        ]) ?>

    </div>
</div>
<br>
<p><?= Html::a('voltar', ['receita/index'], ['class' => 'btn btn-primary']) ?></p>
