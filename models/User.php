<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;


class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }
    public function getId()
    {
        return $this->id;
    }
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
    }
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function tableName()
    {
        return 'Customers';
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }
    
 // Customers Model
    public function rules()
    {
        return [
            [['username', 'password'], 'string', 'max' => 40],
            [['email'], 'string', 'max' => 100],
            [['first_name', 'last_name'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 20],
            [['address', 'auth_key'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'phone' => 'Phone',
            'address' => 'Address',
            'auth_key' => 'Auth Key',
        ];
    }

    public function getOrders()
    {
        return $this->hasMany(Orders::class, ['customer_id' => 'id']);
    }

    public function getReviews()
    {
        return $this->hasMany(Reviews::class, ['customer_id' => 'id']);
    }
}
