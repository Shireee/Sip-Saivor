<?php

namespace app\controllers;

use Yii;
use app\models\Products;
use app\models\Cart;
use app\models\CartItems;
use app\models\Orders;
use app\models\Payments;
use app\models\Reviews;

class ShopController extends \yii\web\Controller
{
    public function actionCoffee()
    {
        $products = Products::find()->where(['category_id' => 2 ])->all();
        return $this->render('coffee', ['products' => $products]);
    }

    public function actionTea()
    {
        $products = Products::find()->where(['category_id' => 1 ])->all();
        return $this->render('tea', ['products' => $products]);
    }

    public function actionAddToCart()
    {
        $productId = Yii::$app->request->post('product_id');
        $quantity = Yii::$app->request->post('quantity');
        
        // Retrieve the current user's ID
        $customerId = Yii::$app->user->id;
        
        // Check if the product already exists in the cart for the customer
        $cartItem = CartItems::find()
            ->where(['cart_id' => 1, 'product_id' => $productId, 'customer_id' => $customerId])
            ->one();
        
        if ($cartItem !== null) {
            // Product already exists, update the quantity
            $cartItem->quantity += $quantity;
        } else {
            // Product doesn't exist, create a new entry
            $cartItem = new CartItems();
            $cartItem->cart_id = 1; // Assuming you have a specific cart ID to associate the item with
            $cartItem->product_id = $productId;
            $cartItem->customer_id = $customerId;
            $cartItem->quantity = $quantity;
        }
        
        if ($cartItem->save()) {
            // Item added to cart successfully
            Yii::$app->session->setFlash('success', 'Item added to cart successfully.');
        } else {
            // Failed to add item to cart
            Yii::$app->session->setFlash('error', 'Failed to add item to cart.');
        }
        
        return $this->redirect(['cart']); // Redirect to the cart view
    }


    public function actionCart()
    {
        // Get the current user's cart items
        $userId = Yii::$app->user->getId();
        $cartItems = CartItems::find()
            ->joinWith('product')
            ->where(['customer_id' => $userId])
            ->all();
        
        // Calculate the total price of the cart
        $totalPrice = 0;
        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->product->price * $cartItem->quantity;
        }

        // Render the cart view with cart items and total price
        return $this->render('cart', [
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice,
        ]);
    }

    public function actionPayment()
{
    // Get the current user's cart items
    $userId = Yii::$app->user->getId();
    $cartItems = CartItems::find()
        ->joinWith('product')
        ->where(['customer_id' => $userId])
        ->all();

    // Check if the cart is empty
    if (empty($cartItems)) {
        Yii::$app->session->setFlash('error', 'Your cart is empty. Please add items to your cart.');
        return $this->redirect(['shop/cart']);
    }

    // Calculate the total price of the cart
    $totalPrice = 0;
    foreach ($cartItems as $cartItem) {
        $totalPrice += $cartItem->product->price * $cartItem->quantity;
    }

    // Create a new Payments model
    $paymentModel = new Payments();

    if (Yii::$app->request->isPost) {
        // Load the payment model with the posted data
        $paymentModel->load(Yii::$app->request->post());

        // Set the payment date
        $paymentModel->payment_date = date('Y-m-d H:i:s');

        // Save the payment details in the Payments table
        $paymentModel->payment_amount = $totalPrice;
        if ($paymentModel->save()) {
            // Save the order details in the Orders table
            $orderModel = new Orders();
            $orderModel->customer_id = $userId;
            $orderModel->order_date = date('Y-m-d H:i:s'); // Set the current date and time as the order date
            $orderModel->price = $totalPrice;
            if ($orderModel->save()) {
                // Assign the order_id to the payment
                $paymentModel->order_id = $orderModel->order_id;
                $paymentModel->save();

                // Clear the cart items
                CartItems::deleteAll(['customer_id' => $userId]);

                Yii::$app->session->setFlash('success', 'Payment successful. Order placed.');

                // Redirect to the store page
                return $this->redirect(['shop/tea']);
            } else {
                Yii::$app->session->setFlash('error', 'Failed to save order details.');
            }
        } else {
            Yii::$app->session->setFlash('error', 'Failed to process payment.');
        }
    }

    return $this->render('payment', [
        'totalPrice' => $totalPrice,
        'paymentModel' => $paymentModel,
    ]);
}

    public function actionViewReviews($productId)
    {
        // Retrieve the product
        $product = Products::findOne($productId);

        // Retrieve the reviews for the product
        $reviews = Reviews::find()->where(['product_id' => $productId])->all();

        return $this->render('view_reviews', ['product' => $product, 'reviews' => $reviews]);
    }

    public function actionAddReview($productId)
    {
        $product = Products::findOne($productId);
        $model = new Reviews();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Set the product and customer ID for the review
            $model->product_id = $productId;
            $model->customer_id = Yii::$app->user->id;
    
            // Set the review date
            $model->review_date = date('Y-m-d H:i:s');
    
            // Save the review to the database
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Review added successfully.');
                return $this->redirect(['shop/coffee']);
            } else {
                Yii::$app->session->setFlash('error', 'Failed to save the review.');
            }
        }

        return $this->render('add_review', [
            'model' => $model,
            'product' => $product,
        ]);
    }
}



    
    
    

    
