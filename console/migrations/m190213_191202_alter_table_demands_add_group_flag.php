<?php

use yii\db\Migration;

/**
 * Class m190213_191202_alter_table_demands_add_group_flag
 */
class m190213_191202_alter_table_demands_add_group_flag extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('demands', 'is_group', $this->boolean()->defaultValue(false));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('demands', 'is_group');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190213_191202_alter_table_demands_add_group_flag cannot be reverted.\n";

        return false;
    }
    */
}
