<?php

use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\DetailView;

use yii\data\ActiveDataProvider;
use app\models\Client;



?>
<h2>Detail View</h2>
<?php

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',                                           // title attribute (in plain text)
        'user_id:email',                                // description attribute formatted as HTML
        'created_at:datetime', 
        'first_name',
        'last_name',
        [
            'attribute'=>'city',
            'label'=>'Current Location',
        ],                            // creation date formatted as datetime
    ],
]);

?>