<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dict_project_stages".
 *
 * @property int $id
 * @property string $title Название
 * @property int $ord Очередность
 */
class DictProjectStages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dict_project_stages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['ord'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'ord' => 'Ord',
        ];
    }
}
