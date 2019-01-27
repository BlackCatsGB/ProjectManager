<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "projects_on_stages_by_user".
 *
 * @property int $cnt
 * @property int $fk_stage
 * @property string $title Название
 * @property int $user_id
 */
class ProjectsOnStagesByUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'projects_on_stages_by_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cnt', 'fk_stage', 'user_id'], 'integer'],
            [['title', 'user_id'], 'required'],
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
            'user_id' => 'User ID',
        ];
    }
}
