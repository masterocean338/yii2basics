<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

?>
<div class="site-about">

            <h2><?=Html::encode($model->id)?></h2>
            <p><?= Html::encode($model->user_id) ?></p>
            <p><?= Html::encode($model->first_name) ?></p>
            <p><?= Html::encode($model->last_name) ?></p>
            <p><?php echo date('Y-m-d H:i:s')  ?></p>
</div>
