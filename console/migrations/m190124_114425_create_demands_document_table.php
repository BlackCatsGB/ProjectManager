<?php

use yii\db\Migration;

/**
 * Handles the creation of table `demands_document`.
 */
class m190124_114425_create_demands_document_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('demands_document', [
            'id' => $this->primaryKey(),
            'title' => $this->string(45)->notNull(),
            'pressmark' => $this->string(45),
            'effective_date' => $this->dateTime(),
            'comment' => $this->string(255)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('demands_document');
    }
}
