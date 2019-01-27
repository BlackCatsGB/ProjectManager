<?php
/**
 * Created by PhpStorm.
 * User: palad
 * Date: 27.01.2019
 * Time: 19:37
 */

namespace common\models;

use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

class TypeModel extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'type';
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Title',
            'type' => 'Type',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
        ];
    }
}