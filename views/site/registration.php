<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Регистрация';
?>

<div class="container">
    <div style="max-width: 70%;"class="site-registration">

        <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'username')->label('Имя пользователя') ?>
            <?= $form->field($model, 'password')->label('Пароль') ?>
            <?= $form->field($model, 'email')->label('Электронная почта') ?>
            <?= $form->field($model, 'first_name')->label('Имя') ?>
            <?= $form->field($model, 'last_name')->label('Фамилия') ?>
            <?= $form->field($model, 'phone')->label('Телефон') ?>
            <?= $form->field($model, 'address')->label('Адрес') ?>
            <div class="form-group">
                <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>