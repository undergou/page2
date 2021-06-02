<?php

namespace app\modules\page;

use Yii;
use yii\base\BootstrapInterface;

class Module extends \yii\base\Module implements BootstrapInterface
{
    /**
     * @return void
     */
    public function init(): void
    {
        parent::init();

        Yii::configure($this, require __DIR__.'/config/config.php');
    }

    /**
     * @inheritDoc
     */
    public function bootstrap($app): void
    {
        $app->getUrlManager()->enablePrettyUrl = true;
        $app->getUrlManager()->showScriptName = false;
        $app->getUrlManager()->suffix = '.html';

        $app->getUrlManager()->addRules(
            [
                'page/category/<slug>'        => 'page/static-page/show-category',
                'page/category/<slug>/<page>' => 'page/static-page/show-category',
                'page/tag/<slug>'             => 'page/static-page/show-tag',
                'page/<slug>'                 => 'page/static-page/show-page',
                'admin/<_c>/<_a>'             => 'page/admin-<_c>/<_a>',
                'site/<_a>'                   => 'page/site/<_a>',
                'vote'                        => 'page/static-page/vote',
                '/'                           => 'page/site',
            ],
            false
        )
        ;
    }
}
