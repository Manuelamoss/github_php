<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

/* @var $this yii\web\View */
/* @var $model common\models\Comentario */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="fundoBranco">

    <h3 class="title">
        <?= Html::encode($model->user->username), " diz:"; ?>
    </h3>
    <p><?= Html::encode(Yii::$app->formatter->asDate($model->data_hora, 'dd/MM/yyyy') . ' às ' . Yii::$app->formatter->asDate($model->data_hora, 'H:mm:ss')) ?></p>

    <div class="row">
        <div class="col-lg-10" id="texto">

            <?= HtmlPurifier::process($model->descricao); ?>

        </div>
        <div class="col-lg-1">
            <?php if (\Yii::$app->user->can('updateComment', ['model' => $model])) { ?>
                <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['comentario/update', 'id' => $model->id, 'id_receita' => $model->id_receita], ['title' => 'alterar', 'id' => 'trocar']); ?>
                &nbsp
                <?= Html::a('', ['comentario/delete', 'id' => $model->id, 'id_receita' => $model->id_receita], [
                    'data' => [
                        'method' => 'post',
                        // use it if you want to confirm the action
                        'confirm' => 'Tem certeza que deseja apagar?',
                    ],
                    'class' => 'glyphicon glyphicon-trash ',
                    'title' => 'apagar',

                ]); ?>
            <?php } ?>
        </div>
    </div>
</div>
<br>