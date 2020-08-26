<?php

namespace app\models;

use yii\db\ActiveRecord;

class Userinfo extends ActiveRecord
{
    public static function tableName()
    {
        return 'user';
    }
}
