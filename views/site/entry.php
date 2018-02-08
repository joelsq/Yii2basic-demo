<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\jui\DatePicker;
?>
<?php $form=ActiveForm::begin();?>

<?= $form->field($model,'name')->label('昵称') ?>
<?= $form->field($model,'email')->label('邮箱') ?>
<div class="form-group">
<?=Html::submitButton('提交',['class'=>'btn btn-primary'])?>
</div>

<?php ActiveForm::end()?>
