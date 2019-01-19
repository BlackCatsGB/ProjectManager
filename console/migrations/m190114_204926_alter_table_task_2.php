<?php

use yii\db\Migration;

/**
 * Class m190114_204926_alter_table_task_2
 */
class m190114_204926_alter_table_task_2 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('task', 'plan', $this->integer()->notNull()->comment('План по часам'));
        $this->addColumn('task', 'fact', $this->integer()->notNull()->comment('Факт по часам'));
        $this->addColumn('task', 'isClosed', $this->boolean()->defaultValue(false)->comment('Задача закрыта'));
        $this->addColumn('task', 'prevTask_id', $this->integer()->comment('Предыдущая задача'));

        $this->addForeignKey('prevTask-task', 'task', 'prevTask_id', 'task', 'id');

        //Чтобы задача могла существовать вне проекта, убираем Not null
        $this->dropForeignKey('task-project', 'task');
        $this->dropColumn('task', 'project_id');
        $this->addColumn('task', 'project_id', $this->integer());
        $this->addForeignKey('task-project', 'task', 'project_id', 'project', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('task-project', 'task');
        $this->dropColumn('task', 'project_id');
        $this->addColumn('task', 'project_id', $this->integer()->notNull());
        $this->addForeignKey('task-project', 'task', 'project_id', 'project', 'id');

        $this->dropForeignKey('prevTask-task', 'task');

        $this->dropColumn('task', 'prevTask_id');
        $this->dropColumn('task', 'isClosed');
        $this->dropColumn('task', 'fact');
        $this->dropColumn('task', 'plan');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190114_204926_alter_table_task_2 cannot be reverted.\n";

        return false;
    }
    */
}
