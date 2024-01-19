<?php
	require_once (ROOT . DS . 'vendor' . DS  . 'BetelPackages' . DS . 'Constants.php');

	function ResultadoBet($resultado) {
		if($resultado == C_BetsResultadoAcerto) return 'Acertou';
		else if($resultado == C_BetsResultadoErro) return 'Errou';
		else return 'Pendente';
	}

	function RolesOptions($role) {
		if($role == C_RoleTudo) return 'Tudo';
		else if($role == C_RoleNada) return 'Nada';
		else if($role == C_RoleTelegram) return 'Telegram';
	}

    function RolesServOptions($role) {
        if($role ==      C_roleservhistbets     ) return 'Hist. bets';
		else if($role == C_roleservwebhooktel     ) return 'Webhook Tel.';
		else if($role == C_roleservreqeve ) return 'Req. evento';
        else if($role == C_roleservreqligas     ) return 'Req. ligas';
		else if($role == C_roleservreqsports     ) return 'Req. esportes';
		else if($role == C_roleservreqevents ) return 'Req. eventos';
        else if($role == C_roleservreqaccinfo     ) return 'Req. Acc. Inf.';
		else if($role == C_roleservreqsaldacc     ) return 'Req. Saldo Acc.';
		else if($role == C_roleservreqplacebet ) return 'Req. Place Bet';
	}
	// Opt == 0 -> Janeiro
	// Opt == 1 -> Jan
	function mesDesc($mes, $opt = 0) {
		if($mes == 1) return $opt == 0 ? 'Janeiro' : 'Jan';
		else if($mes == 2) return $opt == 0 ? 'Fevereiro' : 'Fev';
		else if($mes == 3) return $opt == 0 ? 'Março' : 'Mar';
		else if($mes == 4) return $opt == 0 ? 'Abril' : 'Abr';
		else if($mes == 5) return $opt == 0 ? 'Maio' : 'Mai';
		else if($mes == 6) return $opt == 0 ? 'Junho' : 'Jun';
		else if($mes == 7) return $opt == 0 ? 'Julho' : 'Jul';
		else if($mes == 8) return $opt == 0 ? 'Agosto' : 'Ago';
		else if($mes == 9) return $opt == 0 ? 'Setembro' : 'Setp';
		else if($mes == 10) return $opt == 0 ? 'Outubro' : 'Out';
		else if($mes == 11) return $opt == 0 ? 'Novembro' : 'Nov';
		else if($mes == 12) return $opt == 0 ? 'Dezembro' : 'Dez';
	}

	function gerarCorGradual($percentagem) {
		// Cores de início e fim para as duas partes
		$corInicio1 = 'FD665F';
		$corFim1 = 'FFCE34';

		$corInicio2 = 'FFCE34';
		$corFim2 = '26ed58';

		// Verificar a percentagem para determinar qual intervalo de cores usar
		if ($percentagem <= 0.5) {
			// Interpolação linear entre as cores para os primeiros 50%
			$corInicio = $corInicio1;
			$corFim = $corFim1;
			$percentagem = $percentagem / 0.5; // Normalizar para 0 a 1
		} else {
			// Interpolação linear entre as cores para os próximos 50%
			$corInicio = $corInicio2;
			$corFim = $corFim2;
			$percentagem = ($percentagem - 0.5) / 0.5; // Normalizar para 0 a 1
		}

		// Converte as cores hexadecimais para arrays de componentes RGB
		$inicioRGB = sscanf($corInicio, "%2x%2x%2x");
		$fimRGB = sscanf($corFim, "%2x%2x%2x");

		// Interpolação linear entre as cores
		$corR = intval(($fimRGB[0] - $inicioRGB[0]) * $percentagem + $inicioRGB[0]);
		$corG = intval(($fimRGB[1] - $inicioRGB[1]) * $percentagem + $inicioRGB[1]);
		$corB = intval(($fimRGB[2] - $inicioRGB[2]) * $percentagem + $inicioRGB[2]);

		return sprintf("#%02x%02x%02x", $corR, $corG, $corB);
	}
