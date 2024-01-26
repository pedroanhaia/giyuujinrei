<?php

    // Definindo constantes
    define('PROD_DB_HOST', '193.203.175.11');
    define('PROD_DB_NAME', 'u518597916_betelbd');
    define('PROD_DB_USER', 'u518597916_twelbotcrud');
    define('PROD_DB_PASS', 'iS8ScSjQHpVhqFS');

    // Configurações do fuso horário
    date_default_timezone_set('America/Sao_Paulo');

	// Roles 
		define('C_RoleTudo', 		99);
		define('C_RoleProfessor', 	98);
		define('C_RoleResponsável',	97);
		define('C_RoleEstudante',	96);
		define('C_RoleNada', 		0);

		define('C_RolesOptions', [
			C_RoleTudo => 'Admin',
			C_RoleProfessor => 'Professor',
			C_RoleResponsável => 'Responsável',
			C_RoleEstudante => 'Estudante',
			C_RoleNada => 'Outro',
		]);

		function UsersRoles($role) {
			if($role == C_RoleTudo) return 'Admin';
			if($role == C_RoleProfessor) return 'Professor';
			if($role == C_RoleResponsável) return 'Responsável';
			if($role == C_RoleEstudante) return 'Estudante';
			if($role == C_RoleNada) return 'Outro';
		}

	// Meses e Anos 
		define('C_MesesOpt', [
			1 => 'Janeiro',
			2 => 'Fevereiro',
			3 => 'Março',
			4 => 'Abril',
			5 => 'Maio',
			6 => 'Junho',
			7 => 'Julho',
			8 => 'Agosto',
			9 => 'Setembro',
			10 => 'Outubro',
			11 => 'Novembro',
			12 => 'Dezembro',
		]);

		function strMes($mes) {
			if($mes == 1) return 'Janeiro';
			if($mes == 2) return 'Fevereiro';
			if($mes == 3) return 'Março';
			if($mes == 4) return 'Abril';
			if($mes == 5) return 'Maio';
			if($mes == 6) return 'Junho';
			if($mes == 7) return 'Julho';
			if($mes == 8) return 'Agosto';
			if($mes == 9) return 'Setembro';
			if($mes == 10) return 'Outubro';
			if($mes == 11) return 'Novembro';
			if($mes == 12) return 'Dezembro';
		}

		$anos = range(2024, date('Y'));
		$options = [];
		foreach ($anos as $ano) $anosOpt[$ano] = $ano;

		define('C_AnosOpt', $anosOpt);
	// Cores types 
		define('C_CoreTypeEscola', 		1);
		define('C_CoreTypeAssociacao', 	2);
		define('C_CoreTypePublico',		3);
		define('C_CoreTypePrivado',	4);

		define('C_CoreTypeOptions', [
			C_CoreTypeEscola => 'Escola',
			C_CoreTypeAssociacao => 'Associação',
			C_CoreTypePublico => 'Público',
			C_CoreTypePrivado => 'Privado',
		]);

		function CoresTypes($type) {
			if($type == C_CoreTypeEscola) return 'Escola';
			if($type == C_CoreTypeAssociacao) return 'Associação';
			if($type == C_CoreTypePublico) return 'Público';
			if($type == C_CoreTypePrivado) return 'Privado';
		}
	// Teachers types 
		define('C_TeacherTypeEsporte', 			1);
		define('C_TeacherTypeEnsinoRegular', 	2);

		define('C_TeacherTypeOptions', [
			C_TeacherTypeEsporte => 'Esporte',
			C_TeacherTypeEnsinoRegular => 'Ensino Regular',
		]);

		function TeachersTypes($type) {
			if($type == C_TeacherTypeEsporte) return 'Esporte';
			if($type == C_TeacherTypeEnsinoRegular) return 'Ensino Regular';
		}
	// Schedules 
		define('C_ScheduleRoleAula',		1);
		define('C_ScheduleRoleAvaliacao', 	2);

		define('C_ScheduleRoles', [
			C_ScheduleRoleAula => 'Aula',
			C_ScheduleRoleAvaliacao => 'Avaliação',
		]);

		function ScheduleRoles($role) {
			if($role == C_ScheduleRoleAula) return 'Aula';
			if($role == C_ScheduleRoleAvaliacao) return 'Avaliação';
		}
	// 