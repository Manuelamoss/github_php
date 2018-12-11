<?php
/**
 * Created by PhpStorm.
 * User: Manuela
 * Date: 09/12/2018
 * Time: 11:44
 */

namespace frontend\models;

use yii\rbac\Item;
use yii\rbac\Rule;
use common\models\Comentario;


class AuthorRule extends Rule
{
    public $name = 'isAuthor';

    /**
     * Executes the rule.
     *
     * @param string|int $user the user ID. This should be either an integer or a string representing
     * the unique identifier of a user. See [[\yii\web\User::id]].
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to [[CheckAccessInterface::checkAccess()]].
     * @return bool a value indicating whether the rule permits the auth item it is associated with.
     */
    public function execute($user, $item, $params)
    {
        return isset($params['model']) ? $params['model']->id_user == $user : true;
    }

}