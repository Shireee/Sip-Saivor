<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Чай';
?>
<div class="container">
    <table class="product-table" style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <thead>
            <tr>
                <th>Название</th>
                <th>Описание</th>
                <th>Цена</th>
                <th>Количество</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= Html::encode($product->product_name) ?></td>
                    <td><?= Html::encode($product->description) ?></td>
                    <td><?= Html::encode($product->price) ?></td>
                    <td>
                        <?php $form = ActiveForm::begin(['action' => ['shop/add-to-cart']]); ?>
                        <?= Html::hiddenInput('product_id', $product->product_id) ?>
                        <?= Html::input('number', 'quantity', 1, ['min' => 1]) ?>
                    </td>
                    <td>
                        <?= Html::submitButton('Добавить в корзину', ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Отзывы', ['shop/view-reviews', 'productId' => $product->product_id], ['class' => 'btn btn-success']) ?>
                        <?php ActiveForm::end(); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
