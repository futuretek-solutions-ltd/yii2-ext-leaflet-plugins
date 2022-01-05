<?php

namespace futuretek\leaflet\plugins;

use futuretek\leaflet\Plugin;
use yii\web\JsExpression;

/**
 * Class SingleClick
 *
 * @package futuretek\leaflet\plugins
 * @author  Lukas Cerny <lukas.cerny@futuretek.cz>
 * @link    http://www.futuretek.cz
 */
class SingleClick extends Plugin
{
    const EVENT_SINGLECLICK = 'singleclick';
    
    /**
     * @var int Single click timeout in miliseconds
     */
    public $timeout;

    /**
     * @inheritdoc
     */
    public function getPluginName()
    {
        return 'plugin:singleclick';
    }

    /**
     * @inheritdoc
     */
    public function registerAssetBundle($view)
    {
        SingleClickAsset::register($view);

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function encode()
    {
        return new JsExpression($this->map . '.options.singleClickTimeout = ' . $this->timeout);
    }
}
