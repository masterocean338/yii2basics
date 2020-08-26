<?php
/**
 * User: TheCodeholic
 * Date: 8/11/2019
 * Time: 12:40 PM
 */
/** @var $this \yii\web\View */
/** @var $model \app\models\User */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html; 


?>

<div class="site-register">


    <?php $form = ActiveForm::begin([
        'id' => 'signup-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
        'action'=>['list'],
        'method'=>'get',
    ]); ?>

        <?= $form->field($model, 'id')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'user_id')->textInput(['autofocus' => true]) ?>
        

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                <?= Html::submitButton('Reset', ['class' => 'btn btn-default']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>
