<?php

class VueMap extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function mainMap($mapsArray): void
    {
        ?>
        <div class="map">
            <?php
            foreach ($mapsArray as $map) {
                ?>
                <a class="map_card" href="index.php?module=map&action=show_more&id_map=<?php echo $map['id'] ?>">
                    <div class="map_text">
                        <h2>Map <?php echo $map['id'] ?></h2>
                        <p class="map_biographie_title">// Biographie</p>
                        <p class="map_biographie"><?php echo $map['description'] ?></p>
                    </div>
                    <img src="../images/map/<?php echo $map['image'] ?>" alt="Image of the map">
                    <div class="map_image_shadow"></div>
                </a>
                <?php
            }
            ?>
        </div>
        <?php
    }

    public function showMore($mapArray): void
    {
        ?>
        <div class="map_info">
            <img class="map_info_image" src="../images/map/<?php echo $mapArray['image'] ?>" alt="Image of the map">
            <div class="map_info_text">
                <a class="map_button_go_back" href="index.php?module=map&action=main_map">
                    <img src="../assets/left-arrow-in-circular-button-black-symbol.png" alt="">
                </a>
                <img class="map_info_anchor_right" src="../assets/anchor_right.png" alt="">
                <h2>Map <?php echo $mapArray['id'] ?></h2>
                <p class="map_name_title">// Name</p>
                <p class="map_name"><?php echo $mapArray['name'] ?></p>
                <p class="map_biographie_title">// Biographie</p>
                <p class="map_biographie"><?php echo $mapArray['description'] ?></p>
                <hr>
            </div>
        </div>
        <?php
    }
}