<?php
include_once('src/php/lib/json.php');
include_once('src/php/components/material-switch/material-switch.php');
include_once('src/php/components/table/table.php');
include_once('src/php/components/icons/icon.php');
include_once('src/php/components/dropdown/dropdown.php');
include_once('src/php/models/skills-music/skills-music.php');
include_once('src/php/models/rota/rota.php');
include_once('src/php/models/rota/data-rota-setup.php');
include_once('src/php/models/rota/compile-rota-options.php');
include_once('src/php/models/rota-members/rota-members.php');
include_once('src/php/models/rota-member/rota-member.php');
include_once('src/php/models/rota-member/rota-member-data.php');
include_once('src/php/models/skills/skills-data.php');
include_once('src/php/views/rota-member-availability.php');
include_once('src/php/views/rota-member-skills.php');
include_once('src/php/views/rota-allmembers.php');
include_once('src/php/views/rota-rotas.php');

include_once('src/php/models/db/rota-db-general.php');
include_once('src/php/models/db/rota-db-dummydata.php');

include_once('src/php/models/db/rota-db-interface.php');
include_once('src/php/models/db/rota-rotas.php');
include_once('src/php/models/db/rota-periods.php');
include_once('src/php/models/db/rota-members.php');
include_once('src/php/models/db/rota-availiabilitytypes.php');
RotaSQL_setupdb();

$RESET = false;
if($RESET)
{
	RotaSQL_setuptbls();
	RotaSQL_setDummyInfo();
}




?>