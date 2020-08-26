<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;


$this->title = 'User-Info';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>User Information</h1>

<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>

<table id="customers">
<tr>

<th>Id</th>

<th>name</th>


</tr>

<?php foreach ($userinfo as $user): ?>
    <tr>
        <td>
            <?= Html::encode("{$user->id}") ?>
        </td>
        <td>
            <?= Html::encode("({$user->username})") ?>
        </td>
    </tr>
<?php endforeach; ?>

</table>

<?= LinkPager::widget(['pagination' => $pagination]) ?>