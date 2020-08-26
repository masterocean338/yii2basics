<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;

use yii\base\Model;
use app\models\Client;


class ClientSearch extends Client
{
    public function rules()
    {
       return [
           [['id'],'integer'],
           [['user_id'],'safe']
       ]; 
    }
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    public function search($params){
        $query= Client::find();

        $dataProvider= new ActiveDataProvider([
            'query'=> $query,
            'pagination'=>[
                'pageSize'=>4,
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['id'=> $this->id])
        ->andFilterWhere(['like','user_id',$this->user_id]);

        return $dataProvider;

    }
}
