<?php

namespace app\modules\page\models;

use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "tag".
 *
 * @property int         $id
 * @property string|null $title
 * @property string|null $slug
 */
class Tag extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['title', 'slug'], 'string', 'max' => 255],
            ['slug', 'validateSlug'],
        ];
    }

    /**
     * @return ActiveQuery
     * @throws InvalidConfigException
     */
    public function getStaticPages(): ActiveQuery
    {
        return $this
            ->hasMany(Article::class, ['id' => 'article_id'])
            ->viaTable('article_tag', ['tag_id' => 'id'])
            ;
    }

    /**
     * @param string $userStatus
     *
     * @return ActiveQuery
     * @throws InvalidConfigException
     */
    public function getStaticPagesByStatus(string $userStatus): ActiveQuery
    {
        return $this
            ->getStaticPages()
            ->where(
                [
                    'or',
                    [
                        'or',
                        ['status' => $userStatus],
                        [
                            'status' => $userStatus == Article::STATUS_ADMIN ? Article::STATUS_USER
                                : Article::STATUS_GUEST,
                        ],
                    ],
                    ['status' => Article::STATUS_GUEST],
                ]
            )
            ;
    }

    /**
     * @param $attribute
     * @param $params
     */
    public function validateSlug($attribute, $params): void
    {
        if (!$this->hasErrors() && preg_match_all('/^[a-zA-Z0-9-]+$/', $this->slug) == 0) {
            $this->addError($attribute, 'Incorrect slug');
        }
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->title ?? '';
    }

    /**
     * @return array
     */
    public static function getTitleList(): array
    {
        $list = [];

        /** @var Tag $tag */
        foreach (Tag::find()->all() as $tag) {
            $list[$tag->id] = $tag->title;
        }

        return $list;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id'    => 'ID',
            'title' => 'Title',
            'slug'  => 'Slug',
        ];
    }
}
