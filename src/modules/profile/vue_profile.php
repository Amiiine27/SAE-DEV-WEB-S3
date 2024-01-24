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
                <h1>Mon profil</h1>

                <?php
                $avatarPath = "../images/profile/avatar.png";
                if ($userInfo[0]['img_profil'] != null) {
                    $avatarPath = "../images/profile/avatars/" . $userInfo[0]['img_profil'];
                }
                ?>

                <div class="profile_form">
                    <form action="index.php?module=profile&action=change_profile" method="POST" enctype="multipart/form-data">
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

    public function changeProfile() {
        ?>
        <div class="profile_change_profile">
            <h1 class="profile_change_profile_title">Les modifications ont bien été enregistrer !</h1>
        </div>
        <?php
    }

    public function changeProfileError() {
        ?>
        <div class="profile_change_profile">
            <h1 class="profile_change_profile_title">Erreur, le nom d'utilisateur que vous aviez saisie existe déjà !</h1>
        </div>
        <?php
    }
}