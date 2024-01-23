<?php

class VueEncyclopedia extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function mainEncyclopedia($encyclopediaArray): void
    {
        ?>
        <div class="encyclopedia">
            <?php
            $indexItem = 1;
            foreach ($encyclopediaArray as $item) {
                if ($indexItem % 2 == 0) {
                    ?>
                    <div class="encyclopedia_card encyclopedia_odd">
                        <img class="encyclopedia_anchor encyclopedia_anchor_right" src="../assets/anchor_right.png"
                             alt="Anchor">
                        <div class="encyclopedia_images_main">
                            <img src="../images/encyclopedia/<?php echo $item['image'] ?>" alt="Image of the item"
                                 class="encyclopedia_item_image">
                            <img class="encyclopedia_rectangle_dot" src="../assets/rectangle_dot.png"
                                 alt="Rectangle of dot">
                        </div>
                        <div class="encyclopedia_text">
                            <h2>Name //</h2>
                            <p><?php echo $item['nom'] ?></p>
                            <h2>Biographie //</h2>
                            <p><?php echo $item['biographie'] ?></p>
                        </div>
                    </div>
                    <hr class="encyclopedia_line_odd">
                    <?php
                } else {
                    ?>
                    <div class="encyclopedia_card">
                        <img class="encyclopedia_anchor encyclopedia_anchor_left" src="../assets/anchor_left.png"
                             alt="Anchor">
                        <div class="encyclopedia_images_main">
                            <img src="../images/encyclopedia/<?php echo $item['image'] ?>" alt="Image of the item"
                                 class="encyclopedia_item_image">
                            <img class="encyclopedia_rectangle_dot" src="../assets/rectangle_dot.png"
                                 alt="Rectangle of dot">
                        </div>
                        <div class="encyclopedia_text">
                            <h2>// Name</h2>
                            <p><?php echo $item['nom'] ?></p>
                            <h2>// Biographie</h2>
                            <p><?php echo $item['biographie'] ?></p>
                        </div>
                    </div>
                    <hr class="encyclopedia_line">
                    <?php
                }
                $indexItem++;
            }
            ?>
        </div>
        <?php
    }
}