<?php

namespace suralc\yii2\PureWidgets;

use yii\web\View;

class PureWidgetBaseAssetBundle extends BaseAssetBundle
{
    public $css = [
        'pure.0.4.2-min.css'
    ];

    /**
     * @param View $view
     */
    public function registerAssetFiles($view)
    {
        if (PureAssetConfig::$useCDN !== false) {
            $this->sourcePath = null;
            $this->css = [
                str_replace(
                    ['{version}', '{min}'],
                    [PureAssetConfig::$pureVersion, PureAssetConfig::$useMinified ? '-min' : ''],
                    PureAssetConfig::$useCDN
                )
            ];
        }
        parent::registerAssetFiles($view);
    }
}
