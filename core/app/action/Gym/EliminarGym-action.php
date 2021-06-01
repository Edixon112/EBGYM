<?php

$gym = GymData::delById($_POST["id"]);

core::redir("./?view=Gym/ViewGym");
