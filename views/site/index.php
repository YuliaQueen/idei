<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\ListView */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Супер крутой список покупок';


use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Product;
use app\models\Category;

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
                    'date',
                    'name',
                    'content',
                    'price',
                    [
                        'attribute' => 'category',
                        'format' => 'raw',
                        'value' => 'category.name',
                        'filter' => \yii\helpers\ArrayHelper::map(\app\models\Product::find()->all(), 'category_id', 'category.name'),
                        'filterInputOptions' => array('class' => 'form-control form-control-sm')
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{update} {delete}',
                    ]
                ]

            ]) ?>
        </div>

    </div>
</div>
