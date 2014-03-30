<?php

namespace suralc\yii2\PureWidgets;


use yii\web\AssetBundle;

class BaseAssetBundle extends AssetBundle
{
    public $sourcePath = '@vendor/suralc/yii2-pure-widgets/assets/';

    public function registerAssetFiles($view)
    {
        if (PureAssetConfig::$disableAssetLoading === true) {
            $this->css = [];
            $this->js = [];
        }
        parent::registerAssetFiles($view);
    }
} 