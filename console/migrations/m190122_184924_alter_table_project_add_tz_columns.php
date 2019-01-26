<?php

use yii\db\Migration;

/**
 * Class m190122_184924_alter_table_project_add_tz_columns
 */
class m190122_184924_alter_table_project_add_tz_columns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('project', 'fk_customer', $this->integer()->after('description'));
        $this->addColumn('project', 'fk_project_manager', $this->integer()->after('fk_customer'));
        $this->addColumn('project', 'fk_analyst', $this->integer()->after('fk_project_manager'));
        $this->addColumn('project', 'fk_inspector', $this->integer()->after('fk_analyst'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('project', 'fk_customer');
        $this->dropColumn('project', 'fk_project_manager');
        $this->dropColumn('project', 'fk_analyst');
        $this->dropColumn('project', 'fk_inspector');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190122_184924_alter_table_project_add_tz_columns cannot be reverted.\n";

        return false;
    }
    */
}
