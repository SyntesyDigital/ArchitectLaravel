<?php

namespace Widgets\{name};

use Modules\Architect\Widgets\Widget;
use Modules\Architect\Widgets\WidgetInterface;

class {name} extends Widget implements WidgetInterface
{
    /*
     *  Type of the widget. 'widget' or 'widget-list'
     */
    public $type = 'widget';

    /*
     *  Widget icon
     */
    public $icon = 'fa-th-list';

    /*
     *  Widget name
     */
    public $name = '{name}';

    /*
     *  Widget react when $type == 'widget-list'
     */
    public $widget = '{name}';

    /*
    *   Widget component. Constant only when not list type
    */
    public $component = 'CommonWidget';


    /*
    * Fields of the widget.
    */
    public $fields = [
        //'title' => 'Modules\Architect\Fields\Types\Text',
        //'subtitle' => 'Modules\Architect\Fields\Types\Text',
        //'image' => 'Modules\Architect\Fields\Types\Image',
        //'link' => 'Modules\Architect\Fields\Types\Link',
        //'url' => 'Modules\Architect\Fields\Types\Url',
        //'contents' => 'Modules\Architect\Fields\Types\Contents'
    ];

    /*
    *   Widget rules for validation purpose
    */
    public $rules = [
        'required'
    ];

    /*
    *   Hidden at Architect Moal. Useful when only a subwidget of a list.
    *   Or when disabled for developement.
    */
    public $hidden = false;

    /*
     *  Widget activated settings
     */
    public $settings = [
        'htmlId',
        'htmlClass',
        //'cropsAllowed',
        //'typologyAllowed',
        //'height',
        //'itemsPerPage'
    ];

    /*
    * Default settings merged initially
    */
    public $defaultSettings = [
      //'typologyAllowed' => 1
    ];
}

?>
