<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Sobre';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about" align="center">
    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <h4>Projeto em Sistemas de Informação.</h4>
    <h4>Website desenvolvido por Manuela Moss Martinez aluna do curso de Programação de Sistemas.</h4>
    <h4>Instituto Politécnico de Leiria</h4>

    <?= Html::img('@web/imagens/logo.png',['alt'=>'my logo']) ?>
</div>
