<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;


?>
<div class="site-index">

    <div class="jumbotron">

        <h1>!RIAH!</h1>

        <p class="lead">Receitas com 3 ingredientes apenas!</p><br>
        <p class="lead">Encontre a receita perfeita, prática e rápida e orgulhe-se em prepará-la!</p>
        <br><br>
        <p class="lead" id="font"> Comece esta aventura! </p>
    </div>

    <div class="body-content">

        <div class="row">
            <div align="center">
                <p><a class="btn btn-default" href= <?= Url::to(['receita/index', 'flag' => 1]) ?>>Entrar &raquo;</a></p>
            </div>

        </div>

    </div>
</div>