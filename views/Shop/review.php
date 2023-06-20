<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\ReviewForm; // Update the namespace and class name accordingly
$this->title = 'Отзывы';
?>

<div class="container">
<h1>Product Reviews</h1>

<h2><?= Html::encode($product->product_name) ?></h2>

<!-- Display existing reviews -->
<?php foreach ($reviews as $review): ?>
    <div class="review">
        <div class="comment"><?= Html::encode($review->comment) ?></div>
    </div>
<?php endforeach; ?>

<!-- Form to submit a new review -->
<?php $form = ActiveForm::begin([
    'action' => ['shop/save-review', 'id' => $product->product_id],
    'method' => 'post',
]); ?>

</div>

