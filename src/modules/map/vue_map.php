<?php

class VueMap extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function mainMap()
    {
        ?>
        <div class="map">
            <div class="map_card">
                <div class="map_text">
                    <h2>Map 1</h2>
                    <p class="map_biographie_title">// Biographie</p>
                    <p class="map_biographie">La meilleure défense magique ! Les sorciers du haut de leurs tours lancent
                        des sorts puissants à zone d'effet étendue sur les troupes attaquantes qu'elles soient aériennes
                        ou terrestres</p>
                </div>
                <img src="../../../images/image_map_1.jpg" alt="Image of the map">
                <div class="map_image_shadow"></div>
            </div>
            <div class="map_card">
                <div class="map_text">
                    <h2>Map 2</h2>
                    <p class="map_biographie_title">// Biographie</p>
                    <p class="map_biographie">La meilleure défense magique ! Les sorciers du haut de leurs tours lancent
                        des sorts puissants à zone d'effet étendue sur les troupes attaquantes qu'elles soient aériennes
                        ou terrestres</p>
                </div>
                <img src="../../../images/image_map_2.jpg" alt="Image of the map">
                <div class="map_image_shadow"></div>
            </div>
            <div class="map_card">
                <div class="map_text">
                    <h2>Map 3</h2>
                    <p class="map_biographie_title">// Biographie</p>
                    <p class="map_biographie">La meilleure défense magique ! Les sorciers du haut de leurs tours lancent
                        des sorts puissants à zone d'effet étendue sur les troupes attaquantes qu'elles soient aériennes
                        ou terrestres</p>
                </div>
                <img src="../../../images/image_map_3.jpg" alt="Image of the map">
                <div class="map_image_shadow"></div>
            </div>
        </div>
        <?php
    }
}