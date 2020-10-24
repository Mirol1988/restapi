<?php


namespace app\models;


use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'product';
    }

    public function rules()
    {
        return [
            [['name', 'cat', 'text'], 'required'],
            [['cat'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['text'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }
}