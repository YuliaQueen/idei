<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\ListView */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'My Yii Application';

use yii\data\ActiveDataProvider;
use yii\helpers\Html;

?>

<div class="site-index">

    <div class="jumbotron">
        <h1>СПИСОК ПОКУПОК</h1>

        <p class="lead">Контролируйте свои расходы при помощи нашего списка покупок</p>

        <?= Html::a('Добавить новую покупку', ['create'], ['class' => 'btn btn-lg btn-success']) ?>
    </div>

    <div class="body-content">

        <div class="row">
            <?= yii\grid\GridView::widget([
                'filterModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'columns' => [
                    'name',
                    'content',
                    'price',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{update} {delete}',
                    ]
                ]
            ]) ?>
        </div>

    </div>
</div>
