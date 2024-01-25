<?php

class VueScores extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function mainScores()
    {
        ?>
        <div class="scores">
            <h1>Les scores</h1>
        </div>
        <?php
    }
}