<?php

use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use app\models\Client;
use yii\helpers\Html;



  /*  $dataProvider= new ActiveDataProvider([
        'query'=> Client::find(),
        'pagination'=>[
            'pageSize'=>4,
        ]
    ]);*/


?>
<h2>User List</h2>
<?php echo $this->render('searchform',['model'=>$searchModel])?>

<?php

echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView'=>'_item',
    'viewParams'=>['testParams'=>1],
    'separator'=>"<hr/>",
   // 'options'=> ['class'=>'list-view well'],
    'itemOptions'=>['class'=>'well']
   /* 'itemView' => function($model,$key,$index,$widget){
        ?>
        <div>
            <h2><?=Html::encode($model->id)?></h2>
            <p><?= Html::encode($model->user_id) ?></p>
            <p><?php echo date('Y-m-d H:i:s')  ?></p>
        </div>
<?php
        
    },*/
]);
?>