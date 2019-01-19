<?php

use yii\db\Migration;

/**
 * Class m190119_103511_alter_status_table_type
 */
class m190119_103511_alter_status_table_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('status', 'type', $this->integer()->notNull()->comment('1 - относится к задаче, 2 - относится к проекту'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('status', 'type');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190119_103511_alter_status_table_type cannot be reverted.\n";

        return false;
    }
    */
}
