<?php

namespace suralc\yii2\PureWidgets;

class PureWidgetCustomButtonAssetBundle extends BaseAssetBundle
{
    public $css = array(
        'yiiPureCustomButtonStyles.css',
        'yiiPureCustomButtonSize.css',
    );
    public $depends = array(
        '\suralc\yii2\PureWidgets\PureWidgetBaseAssetBundle'
    );
}
