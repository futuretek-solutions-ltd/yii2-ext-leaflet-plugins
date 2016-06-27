<?php

namespace futuretek\leaflet\plugins;

use dosamigos\leaflet\Plugin;
use yii\web\JsExpression;

/**
 * Class SingleClick
 *
 * @package futuretek\leaflet\plugins
 * @author  Lukas Cerny <lukas.cerny@futuretek.cz>
 * @license http://www.futuretek.cz/license FTSLv1
 * @link    http://www.futuretek.cz
 */
class SingleClick extends Plugin
{
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
