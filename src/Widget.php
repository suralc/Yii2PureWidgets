<?php
/**
 * todo header
 */

namespace suralc\yii2\PureWidgets;

use Yii;

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
        PureWidgetBaseAssetBundle::register($this->getView());
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
    }
}
