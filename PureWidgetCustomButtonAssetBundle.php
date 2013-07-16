<?php

namespace YiiPureWidgets;
use yii\web\AssetBundle;

class PureWidgetCustomButtonAssetBundle extends AssetBundle
{
	public $css = array(
		    'yiiPureCustomButtonStyles.css',
            'yiiPureCustomButtonSize.css',
	);
	
	public $depends = array(
		PureWidgetBaseAssetBundle::className(),
	);
	
	public function __construct($options = array())
	{
		$options['sourcePath'] = __DIR__ . '/assets';
		parent::__construct($options);
	}
}
