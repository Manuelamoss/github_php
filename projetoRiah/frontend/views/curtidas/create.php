<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Curtidas */

$this->title = 'Create Curtidas';
$this->params['breadcrumbs'][] = ['label' => 'Curtidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="curtidas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
