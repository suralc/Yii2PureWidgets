<?php
/**
 * todo header
 */

namespace YiiPureWidgets;

use yii\helpers\Html;

/**
 * Button renders a pure button.
 *
 * For example,
 * //todo example
 * @see http://purecss.io/buttons/
 * @author Antonio Ramirez <amigo.cobos@gmail.com> Author of the original code this is based on
 * @author Suralc
 */
class Button extends Widget
{
    /**
     * Possible states
     */
    const STATE_NONE = false,
        STATE_ACTIVE = 'active',
        STATE_DISABLED = 'disabled';
    /**
     * Possible types
     */
    const TYPE_NONE = false,
        TYPE_PRIMARY = 'primary',
        TYPE_SUCCESS = 'success',
        TYPE_ERROR = 'error',
        TYPE_WARNING = 'warning';
    /**
     * Size
     */
    const SIZE_NONE = false,
        SIZE_XLARGE = 'xlarge',
        SIZE_LARGE = 'large',
        SIZE_SMALL = 'small',
        SIZE_XSMALL = 'xsmall';
    /**
     * @var string the tag to use to render the button
     */
    public $tagName = 'button';
    /**
     * @var string the button label
     */
    public $label = 'Button';
    /**
     * @var boolean whether the label should be HTML-encoded.
     */
    public $encodeLabel = true;
    /**
     * @var string whether to disable the button or to mark it active/disabled
     */
    public $state = self::STATE_NONE;
    /**
     * @var bool|string Button type. One of primary, success, error or warning
     */
    public $type = self::TYPE_NONE;
    /**
     * @var bool|string Button size. One of none, xsmall, small, large, xlarge. Defaults to none, using the default sie of pure
     */
    public $size = self::SIZE_NONE;
    /**
     * @var string
     */
    public $customButtonStylePrefix = 'yiipure-button-';
    /**
     * @var string
     */
    public $customButtonTypeBundleName = 'pure/buttons/custom';

    /**
     * Initializes the widget.
     * If you override this method, make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();
        //$this->clientOptions = false;
        Html::addCssClass($this->options, 'pure-button');
        if ($this->state) {
            Html::addCssClass($this->options, 'pure-button-' . $this->state);
        }
        //todo refacftor
        $view = $this->getView();
        switch ($this->type) {
            case self::TYPE_PRIMARY:
                Html::addCssClass($this->options, 'pure-button-primary');
                break;
            case self::TYPE_SUCCESS:
            case self::TYPE_ERROR:
            case self::TYPE_WARNING:
                $view->registerAssetBundle($this->customButtonTypeBundleName);
                Html::addCssClass($this->options, $this->customButtonStylePrefix . $this->type);
                break;
            case self::TYPE_NONE:
            default:
                break;
        }

        if ($this->size != self::SIZE_NONE) {
            $view->registerAssetBundle($this->customButtonTypeBundleName);
            Html::addCssClass($this->options, $this->customButtonStylePrefix . $this->size);
        }
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        echo Html::tag($this->tagName, $this->encodeLabel ? Html::encode($this->label) : $this->label, $this->options);
    }
}
