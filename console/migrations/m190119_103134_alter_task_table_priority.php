<?php

use yii\db\Migration;

/**
 * Class m190119_103134_alter_task_table_priority
 */
class m190119_103134_alter_task_table_priority extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('task', 'priority_id', $this->integer()->comment('Приоритет'));

        $this->addForeignKey('priority-task', 'task', 'priority_id', 'priority', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('priority-task', 'task');

        $this->dropColumn('task', 'priority_id');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190119_103134_alter_task_table_priority cannot be reverted.\n";

        return false;
    }
    */
}
