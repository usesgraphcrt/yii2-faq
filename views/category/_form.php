<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use usesgraphcrt\faq\models\FaqCategory;
use kartik\select2\Select2;

?>
<!--<div class="form-group shop-control">-->
<!--    --><?//= Html::button('Назад',['class' => 'btn btn-primary pull-left', 'onClick' => 'history.back()']) ?>
<!--</div>-->
<div class="category-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput() ?>
    
    <?= $form->field($model, 'parent_id')
            ->widget(Select2::classname(), [
                'data' => FaqCategory::buildTextTree(null, 1, [$model->id]),
                'language' => 'ru',
                'options' => ['placeholder' => 'Выберите категорию ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
