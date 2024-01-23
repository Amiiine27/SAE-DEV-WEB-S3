<?php

class VueProfile extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function mainProfile($userInfo): void
    {
        if (isset($_SESSION['identifiant_utilisateur'])) {
            ?>
            <div class="profile">
                <h1>Mon profile</h1>

                <?php
                $avatarPath = "../images/profile/avatar.png";
                if ($userInfo[0]['img_profil'] != null) {
                    $avatarPath = "../images/profile/" . $userInfo[0]['img_profile'];
                }
                ?>

                <div class="profile_form">
                    <form action="">
                        <label for="avatar">
                            <img src="<?php echo $avatarPath ?>" alt="">
                        </label>
                        <input type="file" name="avatar" id="avatar" class="input_file">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="<?php echo $userInfo[0]['username'] ?>"
                               placeholder="username">
                        <button type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="profile_not_connected">
                <h1>Vous n'êtes pas connecté(e) !</h1>
            </div>
            <?php
        }
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
                <img class="map_info_anchor_left" src="../assets/anchor_left.png" alt="">
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