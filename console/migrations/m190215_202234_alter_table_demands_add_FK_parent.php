<?php

use yii\db\Migration;

/**
 * Class m190215_202234_alter_table_demands_add_FK_parent
 */
class m190215_202234_alter_table_demands_add_FK_parent extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('demand-parent', 'demands', 'id_parent', 'demands', 'id','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('demand-parent','demands');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190215_202234_alter_table_demands_add_FK_parent cannot be reverted.\n";

        return false;
    }
    */
}
