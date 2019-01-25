<?php

use yii\db\Migration;

/**
 * Handles the creation of table `demands`.
 */
class m190124_111818_create_demands_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('demands', [
            'id' => $this->primaryKey(),
            'uid' => $this->integer()->unique()->notNull(),
            'text' => $this->string(2000)->notNull(),
            'id_version' => $this->integer(),
            'id_parent' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('demands');
    }
}
