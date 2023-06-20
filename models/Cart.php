<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Cart".
 *
 * @property int $cart_id
 * @property int|null $customed_id
 * @property int|null $quantity
 * @property float|null $price
 *
 * @property CartItems[] $cartItems
 * @property Products[] $products
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customed_id', 'quantity'], 'integer'],
            [['price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cart_id' => 'Cart ID',
            'customed_id' => 'Customed ID',
            'quantity' => 'Quantity',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[CartItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCartItems()
    {
        return $this->hasMany(CartItems::class, ['cart_id' => 'cart_id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::class, ['product_id' => 'product_id'])->viaTable('CartItems', ['cart_id' => 'cart_id']);
    }
}
