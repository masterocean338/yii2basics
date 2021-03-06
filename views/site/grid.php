<?php

use yii\grid\GridView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use app\models\Client;


    $dataProvider= new ActiveDataProvider([
        'query'=> Client::find(),
        'pagination'=>[
            'pageSize'=>4,
        ]
    ]);


?>
<h2>Client Grid</h2>
<?php

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'showFooter'=>false,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        // Simple columns defined by the data contained in $dataProvider.
        // Data from the model's column will be used.
        'id',
        [
            'attribute'=>'user_id',
            'label'=>'User ID',
            'contentOptions'=>['style'=>'background-color:yellow;']
        ],
        [
            'attribute'=>'created_at',
            'label'=>'Created @',
            'format'=>['date','php:d-m-Y H:i']
        ],
        // More complex one.
        [
            'class' => 'yii\grid\ActionColumn', // can be omitted, as it is the default
            'header' => 'Actions',
            'footer'=>'Values fetched from Database',
            'headerOptions'=>['width'=>'160']
        ],
    ],
]);

?>