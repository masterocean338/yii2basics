<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $auth_key
 * @property string $access_token
 */
class SignupForm extends Model
{

    public $username;
    public $password;
    public $password_repeat;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username','password','password_repeat'], 'required'],
            [['username','password','password_repeat'], 'string', 'min'=>4,'max' => 16],
            ['password_repeat', 'compare', 'compareAttribute' =>'password']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
        ];
    }
    public function signup(){
        $user= new User();
        $user->username = $this->username;
        $user->password = md5($this->password);
        $user->access_token = \Yii::$app->security->generateRandomString();
        $user->auth_key = \Yii::$app->security->generateRandomString();
        

        if($user->save()){
            return true;
        }

        \Yii::error("User was not saved". VarDumper::dumpAsString($user->errors));
        return false;
    }
}















