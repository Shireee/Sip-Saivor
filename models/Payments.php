<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Payments".
 *
 * @property int $payment_id
 * @property int|null $order_id
 * @property string|null $payment_date
 * @property float|null $payment_amount
 * @property string|null $payment_method
 *
 * @property Orders $order
 */
class Payments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Payments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id'], 'integer'],
            [['payment_date'], 'safe'],
            [['payment_amount'], 'number'],
            [['payment_method'], 'string', 'max' => 50],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::class, 'targetAttribute' => ['order_id' => 'order_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'payment_id' => 'Payment ID',
            'order_id' => 'Order ID',
            'payment_date' => 'Payment Date',
            'payment_amount' => 'Payment Amount',
            'payment_method' => 'Payment Method',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::class, ['order_id' => 'order_id']);
    }
}
