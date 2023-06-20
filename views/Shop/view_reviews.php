<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Отзывы';
?>
<div class="container">
    <h1 style="margin-bottom: 20px;">Товар: <?= Html::encode($product->product_name) ?></h1>

    <?php foreach ($reviews as $review): ?>
        <div class="review" style="margin-bottom: 20px;">
            <h3>Рейтинг: <?= Html::encode($review->rating) ?></h3>
            <p>Отзыв: <?= Html::encode($review->comment) ?></p>
            <p>Дата: <?= Html::encode($review->review_date) ?></p>
        </div>
    <?php endforeach; ?>

    <?= Html::a('Добавить отзыв', ['shop/add-review', 'productId' => $product->product_id]) ?>
</div>
