<?php

use yii\db\Migration;

/**
 * Class m190126_094131_alter_table_project_stages_add_fk
 */
class m190126_094131_alter_table_project_stages_add_fk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('project-project_stage', 'project', 'fk_stage', 'dict_project_stages', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('project-project_stage', 'project');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190126_094131_alter_table_project_stages_add_fk cannot be reverted.\n";

        return false;
    }
    */
}
