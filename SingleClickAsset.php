<?php

namespace futuretek\leaflet\plugins;

use yii\web\AssetBundle;

/**
 * Class SingleClickAsset
 *
 * @package futuretek\leaflet\plugins
 * @author  Lukas Cerny <lukas.cerny@futuretek.cz>
 * @license http://www.futuretek.cz/license FTSLv1
 * @link    http://www.futuretek.cz
 */
class SingleClickAsset extends AssetBundle
{
    public $sourcePath = '@vendor/futuretek/yii2-leaflet-plugins/assets';

    public $depends = ['futuretek\leaflet\LeafLetAsset'];

    public $js = ['singleclick.js'];
}
