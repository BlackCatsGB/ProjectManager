<?php

use yii\db\Migration;

/**
 * Handles the creation of table `demands_source`.
 */
class m190125_110746_create_demands_source_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('demands_source', [
            'id' => $this->primaryKey(),
            'id_doc' => $this->integer(),
            'id_demand' => $this->integer()
        ]);

        $this->addForeignKey('document_relation', 'demands_source', 'id_doc', 'demands_document', 'id');
        $this->addForeignKey('demand_relation_document', 'demands_source', 'id_demand', 'demands', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey('document_relation', 'demands_source');
        $this->dropForeignKey('demand_relation_document', 'demands_source');

        $this->dropTable('demands_source');
    }
}
