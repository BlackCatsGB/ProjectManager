<?php

use yii\db\Migration;

/**
 * Class m190118_202537_alter_project_add_column_stage
 */
class m190118_202537_alter_project_add_column_stage extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //создаем поле для хранения стадии/этапа проекта
        //по умолчанию задается первый (т.е.новый)
        $this->addColumn('project', 'fk_stage', $this->integer()->defaultValue(1));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('project', 'fk_stage');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190118_202537_alter_project_add_column_stage cannot be reverted.\n";

        return false;
    }
    */
}
