<?php
// todo WIP non functional atm
// based on https://github.com/yiisoft/yii2/blob/master/framework/yii/bootstrap/Nav.php
namespace suralc\yii2\PureWidgets;


use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * Nav renders a nav HTML component.
 *
 * For example:
 *
 * ```php
 * echo Menu::widget(array(
 *     'items' => array(
 *         array(
 *             'label' => 'Home',
 *             'url' => '/',
 *             'linkOptions' => array(...),
 *             'active' => true,
 *             'isHeading' => true,
 *         ),
 *         array(
 *             'label' => 'Dropdown',
 *             'items' => array(
 *                  array(
 *                      'label' => 'Level 1 -DropdownA',
 *                      'url' => '#',
 *                      'items' => array(
 *                          array(
 *                              'label' => 'Level 2 -DropdownA',
 *                              'url' => '#',
 *                          ),
 *                      ),
 *                  ),
 *                  array(
 *                      'label' => 'Level 1 -DropdownB',
 *                      'url' => '#',
 *                  ),
 *             ),
 *         ),
 *     ),
 * ));
 * ```
 */
class Menu extends Widget
{

    const MODE_HORIZONTAL = 'horizontal';
    /**
     * todo: note abut why this is compatible
     * @var array list of items in the menu widget. Each array element represents a single
     * menu item with the following structure:
     *
     * - label: string, required, the nav item label.
     * - url: optional, the item's URL. Defaults to "#".
     * - linkOptions: array, optional, the HTML attributes of the item's link.
     * - options: array, optional, the HTML attributes of the item container (LI).
     * - active: boolean, optional, whether the item should be on active state or not.
     */
    public $items = array();
    /**
     * @var bool pure-menu-open
     */
    public $open = true;
    public $mode = self::MODE_HORIZONTAL;
    public $encodeLabels = false;
    public $ulOptions = array();

    public function init()
    {
        Html::addCssClass($this->options, 'pure-menu');
        Html::addCssClass($this->options, 'pure-menu-' . $this->mode);
        if ($this->open) {
            Html::addCssClass($this->options, 'pure-menu-open');
        }
    }

    public function run()
    {
        $menu = Html::beginTag('div', $this->options); // <div class="...">
        $menu .= $this->renderItems();
        $menu .= Html::endTag('div');
        echo $menu;
    }

    /**
     * Renders widget items.
     */
    public function renderItems()
    {
        $items = array();
        $content = '';
        foreach ($this->items as $item) {
            $items[] = $this->renderItem($item);
        }

        return $content . Html::tag('ul', implode("\n", $items), $this->ulOptions);
    }

    /**
     * Renders a widget's item.
     * @param mixed $item the item to render.
     * @throws \yii\base\InvalidConfigException
     * @return string the rendering result.
     */
    public function renderItem($item)
    {
        if (is_string($item)) {
            return $item;
        }
        if (!isset($item['label'])) {
            throw new InvalidConfigException("The 'label' option is required.");
        }
        $label = $this->encodeLabels ? Html::encode($item['label']) : $item['label'];
        $options = ArrayHelper::getValue($item, 'options', array());
        $items = ArrayHelper::getValue($item, 'items');
        $url = Url::to(ArrayHelper::getValue($item, 'url', '#'));
        $linkOptions = ArrayHelper::getValue($item, 'linkOptions', array());

        if (ArrayHelper::getValue($item, 'active')) {
            Html::addCssClass($options, 'pure-menu-selected');
        }
        // has heading:
        if (ArrayHelper::getValue($item, 'isHeading')) {
            Html::addCssClass($options, 'pure-menu-heading');
        }
        $subul = '';
        if ($items !== null) {
            if (is_array($items)) {
                $url = '#';
                $subul = Html::beginTag('ul', $this->ulOptions) . "\n";
                foreach ($items as $sub_item) {
                    $subul .= $this->renderItem($sub_item) . "\n";
                }
                $subul .= Html::endTag('ul') . "\n";
            }
        }
        return Html::tag('li', Html::a($label, $url, $linkOptions) . "\n" . $subul, $options);
    }
}