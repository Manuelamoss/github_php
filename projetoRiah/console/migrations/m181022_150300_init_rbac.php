<?php

use yii\db\Migration;

/**
 * Class m181022_150300_init_rbac
 */
class m181022_150300_init_rbac extends Migration
{
    public function up()
    {
        $auth = Yii::$app->authManager;

        // add "createPost" permission
        $createReceita = $auth->createPermission('createReceita');
        $createReceita->description = 'Create a receita';
        $auth->add($createReceita);

        // add "updatePost" permission
        $updateReceita = $auth->createPermission('updateReceita');
        $updateReceita->description = 'Update receita';
        $auth->add($updateReceita);

        // add "author" role and give this role the "createPost" permission
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createReceita);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updateReceita);
        $auth->addChild($admin, $author);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        //$auth->assign($author, 2);
        $auth->assign($admin, 1);
    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }
    //o codigo abaixo ja estava configurado
    /**
     * {@inheritdoc}
     */
   /* public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
   /* public function safeDown()
    {
        echo "m181022_150300_init_rbac cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181022_150300_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
