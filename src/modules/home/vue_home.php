<?php

class VueHome extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function welcome()
    {
        ?>
        <div class="welcome">
            <video autoplay muted loop>
                <source src="../../../images/video_one_piece.mp4" type="video/mp4"/>
            </video>
            <div class="welcome_text">
                <h1>Red Line Defense</h1>
                <h2>// Resume</h2>
                <p>Le jeu se base dans un monde de pirate dans lequel des pirates attaquera votre chateau. Il
                    y a différents types d’ennemis qui bous attaquent et vous avons aussi un équipage avec différents
                    types
                    de pirate et de tours qui défendra la base et le trésor. </p>
            </div>
        </div>
        <?php
    }
}