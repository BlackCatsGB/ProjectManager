<?php

use yii\db\Migration;

/**
 * Class m190126_094108_table_dict_project_roles
 */
class m190126_094108_table_dict_project_roles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('dict_project_roles', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull()->comment('Name'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('dict_project_roles');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190126_094108_table_dict_project_roles cannot be reverted.\n";

        return false;
    }
    */
}
