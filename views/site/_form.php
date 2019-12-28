<?php

use app\models\Category;
use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\web\View;


/* @var $this View */
/* @var $model app\models\Product */
$this->title = 'Добавить новую покупку';
$categories = \app\models\Category::find()->all();
$items = \yii\helpers\ArrayHelper::map($categories, 'id', 'name');
$params = [
    'prompt' => 'Без категории',
];

?>

<?php $form = \yii\widgets\ActiveForm::begin() ?>

<?= $form->field($model, 'date')->widget(DateTimePicker::className(),[
    'name' => 'dp_1',
    'type' => DateTimePicker::TYPE_INPUT,
    'options' => ['placeholder' => 'Ввод даты/времени...'],
//    'convertFormat' => true,
    'value'=> date("d.m.Y",(integer) $model->date),
    'pluginOptions' => [
//        'format' => 'dd.MM.yyyy',
        'autoclose'=>true,
        'weekStart'=>1, //неделя начинается с понедельника
        'startDate' => '01.05.2015 00:00', //самая ранняя возможная дата
        'todayBtn'=>true, //снизу кнопка "сегодня"
    ]
]); ?>
<?= $form->field($model, 'name')->textInput() ?>
<?= $form->field($model, 'content')->textInput() ?>
<?= $form->field($model, 'category_id')->dropDownList($items, $params) ?>

<?= $form->field($model, 'price')->textInput() ?>


<?= Html::submitButton('Сохранить', [
    'class' => 'btn btn-success',
]) ?>

<?= Html::a('Отмена', ['index'], ['class' => 'btn btn-primary']) ?>

<?php \yii\widgets\ActiveForm::end() ?>


