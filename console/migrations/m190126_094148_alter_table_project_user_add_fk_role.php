<?php

use yii\db\Migration;

/**
 * Class m190126_094148_alter_table_project_user_add_fk_role
 */
class m190126_094148_alter_table_project_user_add_fk_role extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('project_user', 'fk_project_role', $this->integer());

        $this->addForeignKey('project_user-project_role', 'project_user', 'fk_project_role', 'dict_project_roles', 'id','cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('project_user-project_role', 'project_user');

        $this->dropColumn('project_user', 'fk_project_role');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190126_094148_alter_table_project_user_add_fk_role cannot be reverted.\n";

        return false;
    }
    */
}
