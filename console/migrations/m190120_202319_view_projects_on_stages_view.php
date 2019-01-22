<?php

use yii\db\Migration;

/**
 * Class m190120_202319_view_projects_on_stages_view
 */
class m190120_202319_view_projects_on_stages_view extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('CREATE VIEW `projects_on_stages` AS
            SELECT 
                COUNT(0) AS `cnt`,
                `project`.`fk_stage` AS `fk_stage`,
                `dict_project_stages`.`title` AS `title`
            FROM
                (`project`
                JOIN `dict_project_stages`)
            WHERE
                (`project`.`fk_stage` = `dict_project_stages`.`id`)
            GROUP BY `project`.`fk_stage`
            ORDER BY `dict_project_stages`.`ord`'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute('DROP VIEW `project_manager`.`projects_on_stages_`;');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190120_202319_view_projects_on_stages_view cannot be reverted.\n";

        return false;
    }
    */
}
