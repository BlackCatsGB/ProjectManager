<?php

use yii\db\Migration;

/**
 * Class m190126_210111_update_test_values_on_stages
 */
class m190126_210111_update_test_values_on_stages extends Migration
{

    var $table_name = 'dict_project_stages';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->update($this->table_name, ['action' => '/project/index-by-user'], 'id!=-1');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        ;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190126_210111_update_test_values_on_stages cannot be reverted.\n";

        return false;
    }
    */
}
