<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "Products".
 *
 * @property int $product_id
 * @property string|null $product_name
 * @property string|null $description
 * @property float|null $price
 * @property int|null $quantity
 * @property int|null $country_of_origin
 * @property int|null $category_id
 *
 * @property CartItems[] $cartItems
 * @property Cart[] $carts
 * @property Categories $category0
 * @property Countries $countryOfOrigin
 * @property Flavors[] $flavors
 * @property ProductsFlavors[] $productsFlavors
 * @property Reviews[] $reviews
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['price'], 'number'],
            [['quantity', 'country_of_origin', 'category_id'], 'integer'],
            [['product_name'], 'string', 'max' => 100],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['category_id' => 'category_id']],
            [['country_of_origin'], 'exist', 'skipOnError' => true, 'targetClass' => Countries::class, 'targetAttribute' => ['country_of_origin' => 'country_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'product_name' => 'Product Name',
            'description' => 'Description',
            'price' => 'Price',
            'quantity' => 'Quantity',
            'country_of_origin' => 'Country Of Origin',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * Gets query for [[CartItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCartItems()
    {
        return $this->hasMany(CartItems::class, ['product_id' => 'product_id']);
    }

    /**
     * Gets query for [[Carts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::class, ['cart_id' => 'cart_id'])->viaTable('CartItems', ['product_id' => 'product_id']);
    }

    /**
     * Gets query for [[Category0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(Categories::class, ['category_id' => 'category_id']);
    }

    /**
     * Gets query for [[CountryOfOrigin]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountryOfOrigin()
    {
        return $this->hasOne(Countries::class, ['country_id' => 'country_of_origin']);
    }

    /**
     * Gets query for [[Flavors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFlavors()
    {
        return $this->hasMany(Flavors::class, ['flavor_id' => 'flavor_id'])->viaTable('Products_Flavors', ['product_id' => 'product_id']);
    }

    /**
     * Gets query for [[ProductsFlavors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsFlavors()
    {
        return $this->hasMany(ProductsFlavors::class, ['product_id' => 'product_id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Reviews::class, ['product_id' => 'product_id']);
    }
}
