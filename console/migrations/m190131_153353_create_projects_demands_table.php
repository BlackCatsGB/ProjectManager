<?php

use yii\db\Migration;

/**
 * Handles the creation of table `projects_demands`.
 */
class m190131_153353_create_projects_demands_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('projects_demands', [
            //'id' => $this->primaryKey(),
            'fk_project' => $this->integer()->notNull()->comment('Проект'),
            'fk_demand' => $this->integer()->notNull()->comment('Требование'),
            'is_relevant' => $this->integer()->notNull()->comment('Актуальность')->defaultValue(1),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer(),
            'comment' => $this->string(255)->comment('Комментарий'),
        ]);

        $this->addPrimaryKey('pk', 'projects_demands', ['fk_project', 'fk_demand']);

        $this->addForeignKey('pd-projects', 'projects_demands', 'fk_project', 'project', 'id','cascade');
        $this->addForeignKey('pd-demands', 'projects_demands', 'fk_demand', 'demands', 'id','cascade');
        $this->addForeignKey('pd-user-created_by', 'projects_demands', 'created_by', 'user', 'id','cascade');
        $this->addForeignKey('pd-user-updated_by', 'projects_demands', 'updated_by', 'user', 'id','cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('pd-projects', 'projects_demands');
        $this->dropForeignKey('pd-demands', 'projects_demands');
        $this->dropForeignKey('pd-user-created_by', 'projects_demands');
        $this->dropForeignKey('pd-user-updated_by', 'projects_demands');
        $this->dropPrimaryKey('pk', 'projects_demands');

        $this->dropTable('projects_demands');
    }
}
