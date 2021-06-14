<?php

$api = ApiData::delById($_POST["id"]);

core::redir("./?view=Api/ViewApi");