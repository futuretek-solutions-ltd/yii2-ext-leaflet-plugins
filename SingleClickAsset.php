<?php

namespace futuretek\leaflet\plugin\singleclick;

use yii\web\AssetBundle;

/**
 * Class SingleClickAsset
 *
 * @package futuretek\leaflet\plugin\singleclick
 * @author  Lukas Cerny <lukas.cerny@futuretek.cz>
 * @license http://www.futuretek.cz/license FTSLv1
 * @link    http://www.futuretek.cz
 */
class SingleClickAsset extends AssetBundle
{
    public $sourcePath = '@vendor/futuretek/yii2-leaflet-plugin-singleclick/assets';

    public $depends = ['dosamigos\leaflet\LeafLetAsset'];

    public $js = ['singleclick.js'];
}
