<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Products_Flavors".
 *
 * @property int $product_id
 * @property int $flavor_id
 *
 * @property Flavors $flavor
 * @property Products $product
 */
class Products_Flavors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Products_Flavors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'flavor_id'], 'required'],
            [['product_id', 'flavor_id'], 'integer'],
            [['product_id', 'flavor_id'], 'unique', 'targetAttribute' => ['product_id', 'flavor_id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::class, 'targetAttribute' => ['product_id' => 'product_id']],
            [['flavor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Flavors::class, 'targetAttribute' => ['flavor_id' => 'flavor_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'flavor_id' => 'Flavor ID',
        ];
    }

    /**
     * Gets query for [[Flavor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFlavor()
    {
        return $this->hasOne(Flavors::class, ['flavor_id' => 'flavor_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::class, ['product_id' => 'product_id']);
    }
}
