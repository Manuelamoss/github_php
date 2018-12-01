<?php
use \yii\widgets\Pjax;
use yii\helpers\Html;
use common\models\receita;


?>

<?php Pjax::begin([
    'id'                 => 'pjax1',
    'enablePushState'    => false,
    'enableReplaceState' => false,
    'linkSelector'       => '#pjax1 a',

]) ?>

<?php if (!empty($like)) { ?>
    <hr>
    <p>
        <?= ($like == 1) ? 'you like me :)' : 'you do not like me :('; ?>
    </p>
    <hr>
    <?php // Html::a('LIKE', ['receita/test-pjax1', 'like' => 1, ]) ?>

<?php // Html::a('DISLIKE', ['receita/test-pjax1', 'like' => -1, ]) ?>

<?php } else { ?>



<?php } ?>


<?php Pjax::end() ?>