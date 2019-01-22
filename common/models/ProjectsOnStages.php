<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "projects_on_stages".
 *
 * @property int $cnt
 * @property int $fk_stage
 * @property string $title Название
 */
class ProjectsOnStages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'projects_on_stages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cnt', 'fk_stage'], 'integer'],
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cnt' => 'Cnt',
            'fk_stage' => 'Fk Stage',
            'title' => 'Title',
        ];
    }
}
