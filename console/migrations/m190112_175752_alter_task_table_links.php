<?php

use yii\db\Migration;

/**
 * Class m190112_175752_alter_task_table_links
 */
class m190112_175752_alter_task_table_links extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('task', 'result', $this->text()->comment('Результат'));
        $this->addColumn('task', 'status_id', $this->integer()->comment('Статус'));
        $this->addColumn('task', 'deadline', $this->integer()->comment('Срок'));
        $this->addColumn('task', 'type_id', $this->integer()->comment('Тип'));

        $this->addForeignKey('status-task', 'task', 'status_id', 'status', 'id');
        $this->addForeignKey('type-task', 'task', 'type_id', 'type', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('status-task', 'task');
        $this->dropForeignKey('type-task', 'task');

        $this->dropColumn('task', 'result');
        $this->dropColumn('task', 'status_id');
        $this->dropColumn('task', 'deadline');
        $this->dropColumn('task', 'type_id');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190112_175752_alter_task_table_links cannot be reverted.\n";

        return false;
    }
    */
}
