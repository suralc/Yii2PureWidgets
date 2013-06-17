<?php
/**
 * todo header
 */

namespace YiiPureWidgets;

use Yii;
use yii\base\View;

/**
 * \YiiPureWidgets\Widget is the base class for all pure widgets.
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com> Original bootstrap widget
 * @author Suralc
 */
class Widget extends \yii\base\Widget
{
    /**
     * @var boolean whether to use the responsive version of Pure.
     */
    public static $responsive = true;
    /**
     * @var array the HTML attributes for the widget container tag.
     */
    public $options = array();

    /**
     * Initializes the widget.
     * This method will register the pure asset bundle. If you override this method,
     * make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();
        if (!isset($this->getView()->getAssetManager()->bundles['pure/base'])) {
            $this->getView()->getAssetManager()->bundles = array_merge(
                $this->getView()->getAssetManager()->bundles,
                include __DIR__ . '/assets.php'
            );
        }
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        $view = $this->getView();
        $view->registerAssetBundle(static::$responsive ? 'pure/base' : 'pure/base-unresponsive');
    }
}
