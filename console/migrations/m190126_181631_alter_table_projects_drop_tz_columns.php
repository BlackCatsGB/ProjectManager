<?php

use yii\db\Migration;

/**
 * Class m190126_181631_alter_table_projects_drop_tz_columns
 */
class m190126_181631_alter_table_projects_drop_tz_columns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('project', 'fk_customer');
        $this->dropColumn('project', 'fk_project_manager');
        $this->dropColumn('project', 'fk_analyst');
        $this->dropColumn('project', 'fk_inspector');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('project', 'fk_customer', $this->integer()->after('description'));
        $this->addColumn('project', 'fk_project_manager', $this->integer()->after('fk_customer'));
        $this->addColumn('project', 'fk_analyst', $this->integer()->after('fk_project_manager'));
        $this->addColumn('project', 'fk_inspector', $this->integer()->after('fk_analyst'));
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190126_181631_alter_table_projects_drop_tz_columns cannot be reverted.\n";

        return false;
    }
    */
}
