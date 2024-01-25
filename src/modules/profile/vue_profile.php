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
                <img class="profile_anchor_left" src="../assets/anchor_left.png"
                     alt="Anchor">
                <img class="profile_anchor_right" src="../assets/anchor_right.png"
                     alt="Anchor">
                <h1>Mon profil</h1>

                <?php
                $avatarPath = "../images/profile/avatar.png";
                if ($userInfo[0]['img_profil'] != null) {
                    $avatarPath = "../images/profile/avatars/" . $userInfo[0]['img_profil'];
                }
                ?>

                <div class="profile_form">
                    <form action="index.php?module=profile&action=change_profile" method="POST"
                          enctype="multipart/form-data">
                        <label for="avatar">
                            <img src="<?php echo $avatarPath ?>" alt="">
                        </label>
                        <input type="file" name="avatar" id="avatar" class="input_file">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="<?php echo $userInfo[0]['username'] ?>"
                               placeholder="username" required>
                        <a href="index.php?module=profile&action=change_password" class="profile_change_password">Changer
                            le mot de passe</a>
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

    public function changeProfile()
    {
        ?>
        <div class="profile_change_profile">
            <h1 class="profile_change_profile_title">Les modifications ont bien été enregistrer !</h1>
        </div>
        <?php
    }

    public function changeProfileError()
    {
        ?>
        <div class="profile_change_profile">
            <h1 class="profile_change_profile_title">Erreur, le nom d'utilisateur que vous aviez saisie existe déjà
                !</h1>
        </div>
        <?php
    }

    public function changePassword()
    {
        ?>
        <div class="profile_change_password_section">
            <img class="profile_anchor_left" src="../assets/anchor_left.png"
                 alt="Anchor">
            <img class="profile_anchor_right" src="../assets/anchor_right.png"
                 alt="Anchor">
            <form action="index.php?module=profile&action=submit_password" method="POST">
                <h1>Modifier mot passe</h1>
                <label for="actual_password">Mot de passe actuel</label>
                <input type="password" placeholder="Mot de passe" id="actual_password" name="actual_password" required>
                <label for="new_password">Nouveau mot de passe</label>
                <input type="password" placeholder="Nouveau mot de passe" id="new_password" name="new_password"
                       required>
                <label for="confirm_new_password">Confirmer votre mot de passe</label>
                <input type="password" placeholder="Confirmer votre mot de passe" id="confirm_new_password"
                       name="confirm_new_password" required>
                <button type="submit">Valider</button>
            </form>
        </div>
        <?php
    }

    public function actualPasswordError()
    {
        ?>
        <div class="profile_change_profile">
            <h1 class="profile_change_profile_title">Erreur, le mot de passe actuel est incorrect !</h1>
        </div>
        <?php
    }

    public function passwordConfirmError()
    {
        ?>
        <div class="profile_change_profile">
            <h1 class="profile_change_profile_title">Erreur, les mots de passe ne correspondent pas !</h1>
        </div>
        <?php
    }

    public function passwordChangeSuccess()
    {
        ?>
        <div class="profile_change_profile">
            <h1 class="profile_change_profile_title">Le mot de passe a bien été modifié !</h1>
        </div>
        <?php
    }
}