<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php
$this->title = 'Корзина';
?>
<div class="container">
    <h1 style="margin-bottom: 20px;">Корзина</h1>

    <table class="cart-table" style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <thead>
            <tr>
                <th style="padding: 8px; text-align: left; border: 1px solid #ccc;">Название</th>
                <th style="padding: 8px; text-align: left; border: 1px solid #ccc;">Описание</th>
                <th style="padding: 8px; text-align: left; border: 1px solid #ccc;">Цена</th>
                <th style="padding: 8px; text-align: left; border: 1px solid #ccc;">Количество</th>
                <th style="padding: 8px; text-align: left; border: 1px solid #ccc;">Сумма</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cartItems as $cartItem): ?>
                <tr>
                    <td><?= Html::encode($cartItem->product->product_name) ?></td>
                    <td><?= Html::encode($cartItem->product->description) ?></td>
                    <td><?= Html::encode($cartItem->product->price) ?></td>
                    <td><?= Html::encode($cartItem->quantity) ?></td>
                    <td><?= Html::encode($cartItem->product->price * $cartItem->quantity) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div style="margin-top: 10px; margin-bottom: 20px; font-weight: bold;">Общая сумма: <?= $totalPrice ?>$</div>

    <?= Html::a('Перейти к оплате', ['shop/payment'], ['class' => 'btn btn-primary', 'style' => 'display: inline-block; padding: 8px 16px; margin-bottom: 10px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 4px;']) ?>
</div>
