<?php

namespace app\modules\page\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "vote".
 *
 * @property string|null $ip_address
 * @property int|null    $article_id
 * @property int|null    $rating
 * @property Article     $article
 */
class Vote extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'vote';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['article_id', 'rating'], 'integer'],
            [['ip_address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getArticle(): ActiveQuery
    {
        return $this->hasOne(Article::class, ['id' => 'article_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'ip_address' => 'Ip Address',
            'article_id' => 'Article ID',
            'rating'     => 'Rating',
        ];
    }
}
