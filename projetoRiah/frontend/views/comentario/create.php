<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Comentario */

$this->title = 'Criar Comentário';

?>
<div class="comentario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
