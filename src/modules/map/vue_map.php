<?php

class VueMap extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function mainMap($mapArray)
    {
        ?>
        <div class="map">
            <?php
            foreach ($mapArray as $map) {
                ?>
                <a class="map_card" href="index.php">
                    <div class="map_text">
                        <h2>Map <?php echo $map['idMap'] ?></h2>
                        <p class="map_biographie_title">// Biographie</p>
                        <p class="map_biographie"><?php echo $map['Description'] ?></p>
                    </div>
                    <img src="../images/map/<?php echo $map['ImageMap'] ?>" alt="Image of the map">
                    <div class="map_image_shadow"></div>
                </a>
                <?php
            }
            ?>
        </div>
        <?php
    }
}