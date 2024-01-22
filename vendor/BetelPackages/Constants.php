<?php

    // Definindo constantes
    define('PROD_DB_HOST', '193.203.175.11');
    define('PROD_DB_NAME', 'u518597916_betelbd');
    define('PROD_DB_USER', 'u518597916_twelbotcrud');
    define('PROD_DB_PASS', 'iS8ScSjQHpVhqFS');

    // Configurações do fuso horário
    date_default_timezone_set('America/Sao_Paulo');

    // Outras configurações
    define('SITE_NAME', 'Twel Bot');
    define('C_roleservhistbets', 1);
    define('C_roleservwebhooktel', 2);
    define('C_roleservreqeve', 3);
    define('C_roleservreqligas', 4);
    define('C_roleservreqsports', 5);
    define('C_roleservreqaccinfo', 6);
    define('C_roleservreqevents', 7);
    define('C_roleservreqsaldacc', 8);
    define('C_roleservreqplacebet', 9);

	define('C_BetsResultadoAcerto', 1);
	define('C_BetsResultadoErro', 2);

	define('C_RoleTudo', 99);
	define('C_RoleNada', 0);
	define('C_RoleNaoValida', 1);
	define('C_RoleTelegram', 2);

    define('C_stackdefaultsyst', 0.01);

	define('C_RolesOptions', [
        C_RoleTudo => 'Tudo',
		C_RoleNada => 'Nada',
		// C_RoleNaoValida => 'Não valida',
		// C_RoleTelegram => 'Telegram',
	]);

    define('C_RolesServOptions', [
		C_roleservhistbets    => 'Hist. eventos',
		C_roleservwebhooktel => 'Webhook Tel.',
		C_roleservreqeve     => 'Req. evento',
		C_roleservreqligas   => 'Req. ligas',
		C_roleservreqsports  => 'Req. esportes',
		C_roleservreqevents  => 'Req. eventos',
		C_roleservreqaccinfo => 'Req. Acc. Inf.',
        C_roleservreqsaldacc => 'Req. Saldo Acc.',
        C_roleservreqplacebet=> 'Req. Place Bet',
	]);

	define('C_BetsStatusptions', [
		null => 'Todos',
		'LOSS' => 'LOSS',
		'WiN' => 'WIN',
		'MARKET_NOT_FOUND' => 'MARKET_NOT_FOUND',
		'MARKET_SUSPENDED' => 'MARKET_SUSPENDED',
		'PUSH' => 'PUSH',
        'ACCEPTED' => 'ACCEPTED',
	]);
