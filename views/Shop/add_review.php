<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Отзывы';
?>
<div class="container">
    <h1>Товар: <?= Html::encode($product->product_name) ?></h1>

    <div style="margin-bottom: 20px;">
        <?php $form = ActiveForm::begin(['action' => ['shop/add-review', 'productId' => $product->product_id]]); ?>
        <div class="con" style="max-width: 20%;">
        <?= $form->field($model, 'rating')->label('Рейтинг')->textInput() ?>
        <?= $form->field($model, 'comment')->label('Текст отзыва')->textarea(['rows' => 4]) ?>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Отправить отзыв', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
