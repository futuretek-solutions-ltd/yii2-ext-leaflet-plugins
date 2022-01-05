<?php

namespace futuretek\leaflet\plugins;

use yii\web\AssetBundle;

/**
 * Class SingleClickAsset
 *
 * @package futuretek\leaflet\plugins
 * @author  Lukas Cerny <lukas.cerny@futuretek.cz>
 * @link    http://www.futuretek.cz
 */
class SingleClickAsset extends AssetBundle
{
    public $sourcePath = '@vendor/futuretek/yii2-leaflet-plugins/assets';

    public $depends = ['futuretek\leaflet\LeafLetAsset'];

    public $js = ['singleclick.js'];
}
