<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Sobre';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about" align="center">
    <h1><?= Html::encode($this->title) ?></h1>

    <h3>Website desenvolvido por Manuela Moss Martinez.</h3>
    <h3>Aluna do curso de Programação de Sistemas da informação.</h3>


    <?= Html::img('@web/css/imagens/logo.png', ['alt' => 'my logo']) ?>
</div>
