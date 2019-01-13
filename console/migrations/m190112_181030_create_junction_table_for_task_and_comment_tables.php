<?php

use yii\db\Migration;

/**
 * Handles the creation of table `task_comment`.
 * Has foreign keys to the tables:
 *
 * - `task`
 * - `comment`
 */
class m190112_181030_create_junction_table_for_task_and_comment_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('task_comment', [
            'task_id' => $this->integer(),
            'comment_id' => $this->integer(),
            'PRIMARY KEY(task_id, comment_id)',
        ]);

        // creates index for column `task_id`
        $this->createIndex(
            'idx-task_comment-task_id',
            'task_comment',
            'task_id'
        );

        // add foreign key for table `task`
        $this->addForeignKey(
            'fk-task_comment-task_id',
            'task_comment',
            'task_id',
            'task',
            'id',
            'CASCADE'
        );

        // creates index for column `comment_id`
        $this->createIndex(
            'idx-task_comment-comment_id',
            'task_comment',
            'comment_id'
        );

        // add foreign key for table `comment`
        $this->addForeignKey(
            'fk-task_comment-comment_id',
            'task_comment',
            'comment_id',
            'comment',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `task`
        $this->dropForeignKey(
            'fk-task_comment-task_id',
            'task_comment'
        );

        // drops index for column `task_id`
        $this->dropIndex(
            'idx-task_comment-task_id',
            'task_comment'
        );

        // drops foreign key for table `comment`
        $this->dropForeignKey(
            'fk-task_comment-comment_id',
            'task_comment'
        );

        // drops index for column `comment_id`
        $this->dropIndex(
            'idx-task_comment-comment_id',
            'task_comment'
        );

        $this->dropTable('task_comment');
    }
}
