<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\ListView */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Супер крутой список покупок';


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
                    'date',
                    'name',
                    [
                        'attribute' => 'content',
                        'format' => 'raw',
                        'value' => Html::decode('content'),
                    ],
                    'price',
                    [
                        'attribute' => 'category_id',
                        'format' => 'html',
                        'value' => 'category.name',
                        'filter' => \yii\helpers\ArrayHelper::map(\app\models\Category::find()->all(), 'id', 'name'),
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
