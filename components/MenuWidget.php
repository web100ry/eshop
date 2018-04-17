<?php
namespace app\components;
use yii\base\Widget;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 17.04.18
 * Time: 22:13
 */
class MenuWidget extends Widget
{
    public $tpl;

    public function init()
    {
        parent::init();
        if ($this->tpl === null) {
            $this->tpl = 'menu';
        }
        $this->tpl .= ".php";
    }

    public function run()
    {
        return $this->tpl;
    }
}