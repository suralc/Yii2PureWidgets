<?php

namespace YiiPureWidgets;
use yii\web\AssetBundle;

class PureWidgetCustomButtonAssetBundle extends AssetBundle
{
	public $css = array(
		    'yiiPureCustomButtonStyles.css',
            'yiiPureCustomButtonSize.css',
	);
	
	public $depends = array();
	
	public function __construct($options = array())
	{
		$options['sourcePath'] = __DIR__ . '/assets';
		$options = array_merge_recursive($options, array('depends' => array(PureWidgetBaseAssetBundle::className())));
		parent::__construct($options);
	}
}
