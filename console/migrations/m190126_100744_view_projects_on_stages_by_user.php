<?php

use yii\db\Migration;

/**
 * Class m190126_100744_view_projects_on_stages_by_user
 */
class m190126_100744_view_projects_on_stages_by_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('CREATE VIEW `projects_on_stages_by_user` AS
                SELECT 
                    COUNT(0) AS `cnt`,
                    `project`.`fk_stage` AS `fk_stage`,
                    `dict_project_stages`.`title` AS `title`,
                    `dict_project_stages`.`action` AS `action`,
                    `project_user`.`user_id` AS `user_id`
                FROM
                    ((`project`
                    JOIN `dict_project_stages`)
                    JOIN `project_user`)
                WHERE
                    ((`project`.`fk_stage` = `dict_project_stages`.`id`)
                        AND (`project_user`.`project_id` = `project`.`id`))
                GROUP BY `project`.`fk_stage`,user_id
                ORDER BY `dict_project_stages`.`ord`;'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute('DROP VIEW `projects_on_stages_by_user`');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190126_100744_view_projects_on_stages_by_user cannot be reverted.\n";

        return false;
    }
    */
}
