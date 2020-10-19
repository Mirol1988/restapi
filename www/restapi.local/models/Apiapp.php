<?php


namespace app\models;


use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Apiapp extends ActiveRecord implements IdentityInterface
{

    public $_authKey;

    public static function tableName()
    {
        return 'apiapp';
    }

    public static function findIdentity($id)
    {
       return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->_authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

}