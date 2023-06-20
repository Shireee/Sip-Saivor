<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Flavors".
 *
 * @property int $flavor_id
 * @property string|null $flavor_name
 *
 * @property Products[] $products
 * @property ProductsFlavors[] $productsFlavors
 */
class Flavors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Flavors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['flavor_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'flavor_id' => 'Flavor ID',
            'flavor_name' => 'Flavor Name',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::class, ['product_id' => 'product_id'])->viaTable('Products_Flavors', ['flavor_id' => 'flavor_id']);
    }

    /**
     * Gets query for [[ProductsFlavors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsFlavors()
    {
        return $this->hasMany(ProductsFlavors::class, ['flavor_id' => 'flavor_id']);
    }
}
