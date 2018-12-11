<?php

use yii\db\Migration;
use frontend\models\AuthorRule;

/**
 * Class m181022_150300_init_rbac
 */
class m181022_150300_init_rbac extends Migration
{
    public function up()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        $rule = new AuthorRule;
        $auth->add($rule);

        // add "deleteComment" permission
        $deleteComment = $auth->createPermission('deleteComment');
        $deleteComment->description = 'Delete a Comment';
        $auth->add($deleteComment);

        // add "updatePost" permission
        $updateComment = $auth->createPermission('updateComment');
        $updateComment->description = 'Update a Comment';
        $auth->add($updateComment);

        // add the "updateOwnComment" permission and associate the rule with it.
        $updateOwnComment = $auth->createPermission('updateOwnComment');
        $updateOwnComment->description = 'Update own comment';
        $updateOwnComment->ruleName = $rule->name;
        $auth->add($updateOwnComment);

        // add "author" role and give this role the "updateComment" permission
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $deleteComment, $updateComment);

        // "updateOwnPost" will be used from "updatePost"
        $auth->addChild($updateOwnComment, $updateComment);

        // add "admin" role and give this role the "updateComment" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updateComment);
        $auth->addChild($admin, $author);

        // allow "author" to update their own comment
        $auth->addChild($author, $updateOwnComment);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.

        $auth->assign($author, 3);
        $auth->assign($admin, 1);

    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }

}
