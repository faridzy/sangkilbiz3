<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var biz\master\models\OrgnSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="orgn-search">

	<?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

		<?= $form->field($model, 'id_orgn') ?>

		<?= $form->field($model, 'cd_orgn') ?>

		<?= $form->field($model, 'nm_orgn') ?>

		<?= $form->field($model, 'create_at') ?>

		<?= $form->field($model, 'create_by') ?>

		<?php // echo $form->field($model, 'update_at') ?>

		<?php // echo $form->field($model, 'update_by') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
