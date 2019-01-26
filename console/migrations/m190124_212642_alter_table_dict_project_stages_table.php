<?php

use yii\db\Migration;

/**
 * Class m190124_212642_alter_table_dict_project_stages_table
 */
class m190124_212642_alter_table_dict_project_stages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('dict_project_stages', 'fk_permission', $this->string()->comment('Permission'));
        $this->addColumn('dict_project_stages', 'action', $this->string()->defaultValue('/')->comment('Action'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('dict_project_stages','fk_permission');
        $this->dropColumn('dict_project_stages','action');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190124_212642_alter_table_dict_project_stages_table cannot be reverted.\n";

        return false;
    }
    */
}
