<?php

use yii\db\Migration;

/**
 * Class m190201_213146_alter_project_stages_values
 */
class m190201_213146_alter_project_stages_values extends Migration
{
    var $table_name = 'dict_project_stages';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->update($this->table_name, ['title' => '1. new'], ['id' => 1]);
        $this->update($this->table_name, ['title' => '2. analysis'], ['id' => 2]);
        $this->update($this->table_name, ['title' => '3. planing and estimation'], ['id' => 3]);
        $this->update($this->table_name, ['title' => '4. implementation'], ['id' => 4]);
        $this->update($this->table_name, ['title' => '5. testing'], ['id' => 5]);
        $this->update($this->table_name, ['title' => '6. inspection'], ['id' => 6]);
        $this->update($this->table_name, ['title' => '7. acceptance'], ['id' => 7]);
        $this->update($this->table_name, ['title' => 'closed'], ['id' => 8]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190201_213146_alter_project_stages_values cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190201_213146_alter_project_stages_values cannot be reverted.\n";

        return false;
    }
    */
}
