<?php
declare(strict_types=1);

namespace app\models;


use yii\data\ActiveDataProvider;

class SearchProduct extends Product
{
    public function search(array $get)
    {
        $query = Product::find();

        $this->load($get, '');

        if ($this->name !== null) {
            $query->andWhere(['like', 'name', $this->name]);
        }

        if ($this->text !== null) {
            $query->andWhere(['like', 'text', $this->text]);
        }

        if ($this->cat !== null) {
            $query->andWhere(['cat' => $this->cat]);
        }

        $provider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC]
            ],
            'pagination' => [
                'pageSize' => 20
            ]
        ]);

        return [
          'data' => $provider->getModels(),
          'count' => $provider->getTotalCount()
        ];
    }
}