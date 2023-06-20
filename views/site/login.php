<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
$this->title = 'Авторизация';
?>

<div class="container">
    <div class="site-login">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>Для входа в систему заполните следующие поля:</p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'fieldConfig' => [
                        'template' => "{label}\n{input}\n{error}",
                        'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                        'inputOptions' => ['class' => 'col-lg-3 form-control'],
                        'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                    ],
                ]); ?>

                    <?= $form->field($model, 'username')->label('Никнейм') ?>

                    <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

                    <?= $form->field($model, 'rememberMe')->checkbox([
                        'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div>{error}</div>",
                        'label' => 'Запомнить меня',
                        'labelOptions' => ['class' => 'custom-control-label'],
                    ]) ?>
                 <div class="form-group">
                    <div class="row">
                        <div class="col-lg-8">
                            <?= Html::submitButton('Авторизироваться', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>
                        <div class="col-lg-4 text-end">
                            <?= Html::a('Регистрация', ['site/registration'], ['class' => 'text-primary']) ?>
                        </div>
                    </div>
                </div>
                                

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
