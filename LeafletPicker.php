<?php

namespace futuretek\leaflet\plugins;

use futuretek\leaflet\layers\Marker;
use futuretek\leaflet\LeafLet;
use futuretek\leaflet\types\LatLng;
use futuretek\leaflet\widgets\Map;
use yii\base\InvalidConfigException;
use yii\bootstrap\Widget;

/**
 * Class LeafletPicker
 *
 * @package app\classes\leaflet
 * @author  Lukas Cerny <lukas.cerny@futuretek.cz>
 * @link    http://www.futuretek.cz
 */
class LeafletPicker extends Widget
{
    public $gpsLat;
    public $gpsLon;
    public $gpsLatInputId;
    public $gpsLonInputId;
    public $zoom = 12;
    public $height = '400px';
    public $clickTimeout = 300;

    /**
     * @inheritDoc
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        parent::init();

        if ($this->gpsLatInputId === null) {
            throw new InvalidConfigException('Config variable "gpsLatInputId" must be set.');
        }
        if ($this->gpsLonInputId === null) {
            throw new InvalidConfigException('Config variable "gpsLonInputId" must be set.');
        }
    }

    /**
     * @inheritDoc
     * @throws \Exception
     */
    public function run()
    {
        $center = new LatLng(['lat' => $this->gpsLat ?: 49.8001305, 'lng' => $this->gpsLon ?: 14.3539574]);
        $marker = new Marker(['latLng' => $center, 'name' => 'posMarker']);
        $leaflet = new LeafLet([
            'center' => $center,
            'zoom' => $this->gpsLat && $this->gpsLon ? $this->zoom : 8,
            'clientEvents' => [
                SingleClick::EVENT_SINGLECLICK => "function(e) {
                    posMarker.setLatLng(e.latlng);
                    $('#{$this->gpsLatInputId}').val(e.latlng.lat);
                    $('#{$this->gpsLonInputId}').val(e.latlng.lng);
                }",
            ],
        ]);
        $leaflet->addLayer($marker)->addLayer(\Yii::$app->mapTiles);
        $singleClickPlugin = new SingleClick(['timeout' => $this->clickTimeout]);
        $leaflet->installPlugin($singleClickPlugin);
        echo Map::widget([
            'leafLet' => $leaflet,
            'height' => $this->height,
        ]);
    }
}
