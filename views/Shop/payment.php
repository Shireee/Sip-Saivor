<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Оплата';
?>
<div class="container">
    <h1>Оплата</h1>
    <div class="di" style="margin-top: 20px;"></div>
    <div style="margin-bottom: 20px;">Сумма: <?= $totalPrice ?>$</div>
    <div class="fi" style="width: 20%; margin-top: 20px;">
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($paymentModel, 'payment_method')->label('Метод оплаты')->dropDownList([
            'PayPal' => 'PayPal',
            'SberPay' => 'SberPay',
            'Alpha' => 'Alpha',
        ], ['prompt' => 'Выберите метод оплаты', 'class' => 'form-control'])->label(false) ?>
        <div class="di" style="margin-bottom: 20px;"></div>
        <?= Html::submitButton('Оплатить', ['class' => 'btn btn-primary', 'style' => 'margin-bottom: 20px;']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
