<?php

use yii\db\Migration;

/**
 * Class m190118_195502_create_dict_project_stages_table
 */
class m190118_195502_create_dict_project_stages_table extends Migration
{
    var $table_name = 'dict_project_stages';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {


        $this->createTable($this->table_name, [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull()->comment('Название'),
            'ord' => $this->integer()->comment('Очередность'),
        ]);

        $this->insert($this->table_name, ['id' => 1, 'title' => 'новый', 'ord' => 1]);
        $this->insert($this->table_name, ['id' => 2, 'title' => 'анализ', 'ord' => 2]);
        $this->insert($this->table_name, ['id' => 3, 'title' => 'планирование и оценка', 'ord' => 3]);
        $this->insert($this->table_name, ['id' => 4, 'title' => 'выполнение', 'ord' => 4]);
        $this->insert($this->table_name, ['id' => 5, 'title' => 'тестирование', 'ord' => 5]);
        $this->insert($this->table_name, ['id' => 6, 'title' => 'контроль', 'ord' => 6]);
        $this->insert($this->table_name, ['id' => 7, 'title' => 'приемка', 'ord' => 7]);
        $this->insert($this->table_name, ['id' => 8, 'title' => 'закрыт', 'ord' => 8]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->table_name);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190118_195502_create_dict_project_stages_table cannot be reverted.\n";

        return false;
    }
    */
}
