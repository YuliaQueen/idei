<?php

use dosamigos\tinymce\TinyMce;
use kartik\date\DatePicker;
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

<?= $form->field($model, 'date')->widget(DatePicker::ClassName(), [
    'name' => 'check_issue_date',
    'value' => date("d.m.Y", (integer)$model->date),
    'options' => ['placeholder' => 'Выбрать дату ...'],
    'pluginOptions' => [
        'todayHighlight' => true
    ]
]); ?>
<?= $form->field($model, 'name')->textInput() ?>

<?php echo $form->field($model, 'content')->widget(TinyMce::className(), [
    'options' => ['rows' => 12],
    'language' => 'ru',
    'clientOptions' => [
        'plugins' => [
            'advlist autolink lists link charmap  print hr preview pagebreak',
            'searchreplace wordcount textcolor visualblocks visualchars code fullscreen nonbreaking',
            'save insertdatetime media table contextmenu template paste image'
        ],
        'toolbar' => 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
    ]
]) ?>

<?= $form->field($model, 'category_id')->dropDownList($items, $params) ?>

<?= $form->field($model, 'price')->textInput() ?>


<?= Html::submitButton('Сохранить', [
    'class' => 'btn btn-success',
]) ?>

<?= Html::a('Отмена', ['index'], ['class' => 'btn btn-primary']) ?>

<?php \yii\widgets\ActiveForm::end() ?>


