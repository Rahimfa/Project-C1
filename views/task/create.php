<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Task $model */

$this->title = 'Create Task';

?>
<div class="task-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
