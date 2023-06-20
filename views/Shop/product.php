<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Отзывы';
?>
<div class="container">
    <h1><?= Html::encode($product->name) ?></h1>
    <p><?= Html::encode($product->description) ?></p>

    <h2>Product Reviews</h2>
    <?php foreach ($reviews as $review): ?>
        <div class="review">
            <p><?= Html::encode($review->comment) ?></p>
            <p>Rating: <?= Html::encode($review->rating) ?></p>
        </div>
    <?php endforeach; ?>

    <h2>Leave a Review</h2>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($reviewModel, 'comment')->textarea(['rows' => 4]) ?>

    <?= $form->field($reviewModel, 'rating')->dropDownList([1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5']) ?>

    <?= Html::submitButton('Submit Review', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>
</div>