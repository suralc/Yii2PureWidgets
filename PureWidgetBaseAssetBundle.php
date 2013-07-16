<?php

namespace YiiPureWidgets;
use yii\web\AssetBundle;

class PureWidgetBaseAssetBundle extends AssetBundle
{
	public $css = array(
		'pure.0.2.0-min.css',
	);
	
	public $depends = array(
		'yii\web\YiiAsset',
		'yii\bootstrap\ResponsiveAsset',
	);
	
	public function __construct($options = array())
	{
		$options['sourcePath'] = __DIR__ . '/assets';
		parent::__construct($options);
	}
}
