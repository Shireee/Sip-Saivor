<?php
/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="../css/style.min.css">
    <?php $this->head() ?>
</head>

<body>
    <div class="wrapper">
        <!-- Header -->
        <header class="header">
            <div class="container">
                <div class="header__inner">
                    <div class="header__contacts">
                        <a href="tel:89001305478" class="header__contacts-number">+7 (900) 130 54 78</a>
                        <a href="mailto:sip&saivor@gmail.com" class="header__contacts-email">sip&saivor@gmail.com</a>
                        <p class="header__contacts-description">каждый день 10<sup>00</sup>-17<sup>00</sup></p>
                    </div>
                    <nav class="menu">
                    <a href="<?= Yii::$app->homeUrl ?>" class="menu__logo">
                        <img class="menu__logo-img" src="<?= Yii::$app->request->baseUrl ?>/images/logo-black.png" alt="logo">
                    </a>

                    <ul class="menu__list">
                        <li class="menu__list-item">
                            <a href="<?= Yii::$app->urlManager->createUrl(['/shop/coffee']) ?>" class="menu__list-link">Кофе</a>
                        </li>
                        <li class="menu__list-item">
                            <a href="<?= Yii::$app->urlManager->createUrl(['/shop/tea']) ?>" class="menu__list-link">Чай</a>
                        </li>
                        <li class="menu__list-item">
                            <a href="<?= Yii::$app->urlManager->createUrl(['/site/delivery']) ?>" class="menu__list-link">Доставка</a>
                        </li>
                        <li class="menu__list-item">
                            <a href="<?= Yii::$app->urlManager->createUrl(['/site/about']) ?>" class="menu__list-link">О нас</a>
                        </li>
                    </ul>
                        <div class="menu__icons">
                            <a href="<?= Yii::$app->user->isGuest ? Yii::$app->urlManager->createUrl(['/site/login']) : Yii::$app->urlManager->createUrl(['/shop/cart']) ?>" class="menu__cart">
                                <img class="menu__cart-img" src="<?= Yii::$app->urlManager->baseUrl ?>../images/cart.png" alt="cart">
                            </a>
                            <?php if (Yii::$app->user->isGuest): ?>
                                <a href="<?= Yii::$app->urlManager->createUrl(['/site/login']) ?>" class="menu___profile">
                                    <img class="menu___profile-img" src="<?= Yii::$app->urlManager->baseUrl ?>../images/user.png" alt="profile">
                                </a>
                            <?php else: ?>
                                <?= Html::beginForm(['/site/logout'], 'post', ['class' => 'menu___profile']) ?>
                                    <?= Html::submitButton(
                                        Html::img(Yii::$app->urlManager->baseUrl . '/images/user.png', ['alt' => 'profile']),
                                        ['class' => 'menu___profile-img', 'style' => 'border: none; background: none;']
                                    ) ?>
                                <?= Html::endForm() ?>
                            <?php endif; ?>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!-- Header end -->

        <!-- Main -->
        <main class="main">
        

                <?= Alert::widget() ?>
                <?= $content ?>

        </main>
        <!-- Main end -->

        <!-- Footer -->
        <footer class="footer">
            <div class="footer__content">
                <div class="container">
                    <div class="footer__inner">
                        <div class="footer__info">
                            <h6 class="footer__info-title">
                                Свяжитесь с нами
                            </h6>
                            <p class="footer__info-text">
                                Если у вас есть вопросы или пожелания, пишите нам!
                            </p>
                            <a class="footer__info-email" href="mailto:ouremailaddress@gmail.com">
                                sip&saivor@gmail.com
                            </a>
                        </div>

                        <ul class="footer__social">
                            <li class="footer__social-item">
                                <a class="footer__social-link footer__social-link--instagram" href="https://www.instagram.com/Shireee">Instagram</a>
                            </li>
                            <li class="footer__social-item">
                                <a class="footer__social-link footer__social-link--whatsapp" href="https://wa.me/+79891206808">WhatsApp</a>
                            </li>
                        </ul>

                        <nav class="footer__menu">
                            <ul class="footer__menu-list">
                                <li class="footer__menu-item">
                                    <a href="<?= Yii::$app->urlManager->createUrl(['/site/delivery']) ?>" class="footer__menu-link">Доставка</a>
                                </li>
                                <li class="footer__menu-item">
                                    <a class="footer__menu-link" href="tel:89001305478">Помощь</a>
                                </li>
                                <li class="footer__menu-item">
                                    <a href="<?= Yii::$app->urlManager->createUrl(['/site/about']) ?>" class="footer__menu-link">О нас</a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
            <div class="footer__copyright">
                <div class="container">
                    <p>© 2023 «Sip&Saivor»</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- Footer end -->

    <script src="js/main.min.js"></script>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
