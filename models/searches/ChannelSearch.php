<?php

namespace app\models\searches;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Channel;

/**
 * ChannelSearch represents the model behind the search form of `app\models\Channel`.
 */
class ChannelSearch extends Channel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'viewCount', 'subscriberCount', 'videoCount', 'status'], 'integer'],
            [['title', 'slug', 'youtube_id', 'description', 'thumbnails', 'banners', 'last_activity', 'synchronized_at', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Channel::find()->where(['status' => self::STATUS_ACTIVE]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'viewCount' => $this->viewCount,
            'subscriberCount' => $this->subscriberCount,
            'videoCount' => $this->videoCount,
            'status' => $this->status,
            'last_activity' => $this->last_activity,
            'synchronized_at' => $this->synchronized_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'youtube_id', $this->youtube_id])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'thumbnails', $this->thumbnails])
            ->andFilterWhere(['like', 'banners', $this->banners]);

        return $dataProvider;
    }
}
