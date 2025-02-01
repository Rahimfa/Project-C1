<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';

?>

<style>
    .login-container {
        margin-top: 3%!important;
        min-height: 600px;
        background-color: #fff;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }

    .decoration-top {
        position: absolute;
        top: -30px;
        right: -30px;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background-color: #4CAF50;
        opacity: 0.1;
        z-index: 1;
    }

    .decoration-bottom {
        position: absolute;
        bottom: -50px;
        left: -50px;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        background-color: #2196F3;
        opacity: 0.1;
        z-index: 1;
    }

    .login-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        padding: 2.5rem;
        position: relative;
        z-index: 2;
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
    }

    .login-title {
        color: #333;
        font-size: 1.75rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 1rem;
    }

    .login-subtitle {
        color: #666;
        text-align: center;
        margin-bottom: 2rem;
        font-size: 0.95rem;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1.5px solid #e0e0e0;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.2s ease;
        background-color: #f8f9fa;
    }

    .form-control:focus {
        border-color: #2196F3;
        box-shadow: 0 0 0 3px rgba(33, 150, 243, 0.1);
        outline: none;
        background-color: #fff;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: #444;
        font-size: 0.95rem;
    }

    .form-group {
        margin-bottom: 1.25rem;
    }

    .btn-primary {
        background-color: #2196F3;
        border: none;
        border-radius: 8px;
        color: white;
        padding: 0.75rem 1.5rem;
        width: 100%;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .btn-primary:hover {
        background-color: #1976D2;
        transform: translateY(-1px);
    }

    .btn-primary:active {
        transform: translateY(1px);
    }

    .custom-checkbox {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .custom-checkbox input[type="checkbox"] {
        width: 18px;
        height: 18px;
        margin-right: 8px;
        accent-color: #2196F3;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }

    @media (max-width: 640px) {
        .login-card {
            padding: 1.5rem;
        }
    }
</style>

<div class="login-container">
    <div class="decoration-top"></div>
    <div class="decoration-bottom"></div>
    
    <div class="login-card">
        <h1 class="login-title">Welcome Back</h1>
        <p class="login-subtitle">Sign in to continue</p>

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'fieldConfig' => [
                'template' => "{label}\n{input}\n{error}",
                'labelOptions' => ['class' => 'form-label'],
                'inputOptions' => ['class' => 'form-control'],
                'errorOptions' => ['class' => 'invalid-feedback'],
            ],
        ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Enter your username']) ?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Enter your password']) ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <?= Html::submitButton('Login', ['class' => 'btn-primary', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>