<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Poststatus;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model,'status')
         ->dropDownList(Poststatus::find()
						->select(['name','id'])
						->orderBy('position')
						->indexBy('id')
						->column(),
    		   ['prompt'=>'请选择状态']);?>

	<?= $form->field($model,'author_id')
         ->dropDownList(User::find()
						->select(['username','id'])
						->indexBy('id')
						->column(),
    		   ['prompt'=>'请选择作者']);?>
    		   
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
