<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Receita */

$this->title = 'Create Receita';
$this->params['breadcrumbs'][] = ['label' => 'Receitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receita-create">

    <h1><?= Html::encode($this->title) ?></h1>

    // create post
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>




</div>
