<?php
use app\models\Product;
use yii\web\View;

/* @var $this View */
/* @var $model Product */

$this->title = 'Изменить данные о товаре';
?>

    <h1><?= $this->title; ?></h1>

<?= $this->render('_form', ['model'=> $model]); ?>