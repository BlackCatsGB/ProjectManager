<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comment`.
 */
class m190112_180630_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comment', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer(),
            'text'=>$this->text()->notNull()->comment('Текст'),
            'created_at'=>$this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('comment');
    }
}
