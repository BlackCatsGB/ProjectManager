<?php

use yii\db\Migration;

/**
 * Class m190210_092645_alter_table_demands_disable_notnull_for_uid
 */
class m190210_092645_alter_table_demands_disable_notnull_for_uid extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //$this->dropColumn('demands','uid');
        $this->alterColumn('demands','uid',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //$this->alterColumn('demands','uid',$this->integer()->notNull());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190210_092645_alter_table_demands_disable_notnull_for_uid cannot be reverted.\n";

        return false;
    }
    */
}
