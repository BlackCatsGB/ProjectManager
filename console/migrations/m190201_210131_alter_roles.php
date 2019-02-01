<?php

use yii\db\Migration;

/**
 * Class m190201_210131_alter_roles
 */
class m190201_210131_alter_roles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->update('auth_item', ['name' => 'moveToAnalyseProject'], ['name' => 'toAnalyseProject']);
        $this->update('auth_item', ['name' => 'moveToNewProject'], ['name' => 'toNewProject']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        ;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190201_210131_alter_roles cannot be reverted.\n";

        return false;
    }
    */
}
