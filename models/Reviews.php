<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Reviews".
 *
 * @property int $review_id
 * @property int|null $product_id
 * @property int|null $customer_id
 * @property int|null $rating
 * @property string|null $comment
 * @property string|null $review_date
 *
 * @property Customers $customer
 * @property Products $product
 */
class Reviews extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'Reviews';
    }

    public function rules()
    {
        return [
            [['comment', 'rating'], 'required'],
            [['comment'], 'string'],
            [['rating'], 'integer', 'min' => 1, 'max' => 5],
        ];
    }

    public function attributeLabels()
    {
        return [
            'review_id' => 'Review ID',
            'product_id' => 'Product ID',
            'customer_id' => 'Customer ID',
            'rating' => 'Rating',
            'comment' => 'Comment',
            'review_date' => 'Review Date',
        ];
    }

    public function getCustomer()
    {
        return $this->hasOne(Customers::class, ['id' => 'customer_id']);
    }

    public function getProduct()
    {
        return $this->hasOne(Products::class, ['product_id' => 'product_id']);
    }
}
