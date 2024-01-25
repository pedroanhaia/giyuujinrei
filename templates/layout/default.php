<?php
	use Cake\Routing\Router;
?>
<!DOCTYPE html>
<html>
<head>
	<?= $this->Html->charset() ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Giyuujinrei: Dojo online </title>
	<?= $this->Html->meta('icon', 'img/brandelli.png')?>

	<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
	<?= $this->Html->css(['https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css','sidebars', 'home2', 'classescssproprias','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css','styleSideBarComDarkMode.css', 'https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css']) ?>
	<?= $this->Html->css(['css.css']) ?>

	<?= $this->Html->script(['https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', "https://code.jquery.com/jquery-3.7.1.min.js"]) ?>
	<?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

	<!-- CSS -->
	<?= $this->Html->css("/dist/css/pages/tab-page") ?>

	<!-- Jquery -->
	<?= $this->Html->script("/plugins/jquery/jquery-3.2.1.min") ?>
	<?= $this->Html->script("reqajaxforserver") ?>

	<!-- Selectpicker -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.6/js/bootstrap-select.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.6/css/bootstrap-select.min.css" rel="stylesheet" />


	<!-- Wave Effects -->
	<?= $this->Html->script("/dist/js/waves") ?>
	<!-- Menu sidebar -->
	<?= $this->Html->script("/dist/js/sidebarmenu") ?>

	<!-- Máscara dinheiro  -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

	<!-- Datatable -->
	<?= $this->Html->css("/plugins/datatables/datatables.min") ?>
	<?= $this->Html->script("/plugins/datatables/datatables.min") ?>

	<!-- Masks -->
	<?= $this->Html->script('/plugins/jQuery-Mask-Plugin-master/src/jquery.mask.js') ?>

	<!-- Bootbox - confirms -->
	<?= $this->Html->script('/plugins/bootbox/bootbox.min.js') ?>
	<?= $this->Html->script('/plugins/bootbox/bootbox.locales.min.js') ?>

	<!--- E-Charts -->
	<?= $this->Html->script("/plugins/echarts/echarts") ?>

	<?= $this->fetch('meta') ?>
	<?= $this->fetch('css') ?>
	<?= $this->fetch('script') ?>
</head>
<body class='<?= $darkMode ? 'dark' : '' ?>'>
	<nav class="sidebar close">
		<header>
			<i class='bx bx-chevron-right toggle'></i>
		</header>
		<div class="menu-bar">
			<div class="menu">
				<ul class="menu-links">
                    <li class="nav-link">
						<?= $this->Html->link('<i class="fa-solid fa-ranking-star icon"></i> ' . __('Dashboard'), '/relatorios', ['escape' => false, 'class' => '']);?>
					</li>
					<li class="nav-link">
						<?= $this->Html->link('<i class="fa-solid fa-torii-gate icon"></i> ' . __('Dojos'), '/cores', ['escape' => false, 'class' => '']);?>
					</li>
					<li class="nav-link">
						<?= $this->Html->link('<i class="fa-solid fa-people-roof icon"></i>' . __('Estudantes'), '/students', ['escape' => false, 'class' => '']);?>
					</li>
					<li class="nav-link">
						<?= $this->Html->link('<i class="fa-solid fa-users icon"></i> ' . __('Professores'), '/teachers', ['escape' => false, 'class' => '']);?>
					</li>
					<li class="nav-link">
						<?= $this->Html->link('<i class="fa-solid fa-users icon"></i> ' . __('Responsáveis'), '/responsible', ['escape' => false, 'class' => '']);?>
					</li>
					<li class="nav-link">
						<?= $this->Html->link('<i class="fa-solid fa-users icon"></i> ' . __('Turmas'), '/classes', ['escape' => false, 'class' => '']);?>
					</li>
					<li class="nav-link">
						<?= $this->Html->link('<i class="fa fa-user-graduate icon"></i> ' . __('Graduações'), '/ranks', ['escape' => false, 'class' => '']);?>
					</li>
					<li class="nav-link">
						<?= $this->Html->link('<i class="fa-solid fa-star icon"></i> ' . __('Avaliações'), '/assessment', ['escape' => false, 'class' => '']);?>
					</li>
					<li class="nav-link">
						<?= $this->Html->link('<i class="fa-solid fa-server icon"></i>' . __('Índices'), '/Indexes', ['escape' => false, 'class' => '']);?>
					</li>
					<!-- <li class="nav-link">
						<?= $this->Html->link('<i class="fa-solid fa-layer-group icon"></i>' . __('Áreas'), '/ratings', ['escape' => false, 'class' => '']);?>
					</li> -->
					<li class="nav-link">
						<?= $this->Html->link('<i class="fa-solid fa-calendar-day icon"></i>' . __('Agendamentos'), '/schedules', ['escape' => false, 'class' => '']);?>
					</li>
					<li class="nav-link">
						<?= $this->Html->link('<i class="fa-solid fa-person-skiing icon"></i> ' . __('Esportes'), '/sports', ['escape' => false, 'class' => '']);?>
					</li>
					<li class="nav-link">
						<?= $this->Html->link('<i class="fa-solid fa-clipboard-user icon"></i>' . __('Usuários'), '/users', ['escape' => false, 'class' => '']);?>
					</li>
				</ul>
			</div>
			<div class="bottom-content">
				<li class="">
					<?= $this->Html->link('<i class="bx bx-log-out icon"></i> ' . __('<span class="text nav-text">Logout</span>'), '/Users/logout', ['escape' => false, 'class' => '']);?>
				</li>

				<li class="mode">
					<div class="sun-moon">
						<i class='bx bx-moon icon moon'></i>
						<i class='bx bx-sun icon sun'></i>
					</div>
					<span class="mode-text text">Dark mode</span>

					<div class="toggle-switch">
						<span class="switch"></span>
					</div>
				</li>

			</div>
		</div>
	</nav>
	<main class="main">
		<div class="container">
			<?= $this->Flash->render() ?>
			<?= $this->element('preload'); ?>
			<?= $this->fetch('content') ?>
		</div>
	</main>
</body>
</html>
<script>
	// Dark mode 
		const body = document.querySelector('body'),
			sidebar = body.querySelector('nav'),
			toggle = body.querySelector(".toggle"),
			//   searchBtn = body.querySelector(".search-box"),
			modeSwitch = body.querySelector(".toggle-switch"),
			modeText = body.querySelector(".mode-text");

		toggle.addEventListener("click" , () =>{
			sidebar.classList.toggle("close");
		})

		modeSwitch.addEventListener("click" , () =>{
			body.classList.toggle("dark");
			darkMode();
		});

		function importarCSS(caminhoArquivo) {
			var link = document.createElement('link');
			link.rel = 'stylesheet';
			link.type = 'text/css';
			link.href = caminhoArquivo;

			document.head.appendChild(link);
		}

		function desimportarCSS(caminhoArquivo) {
			var links = document.getElementsByTagName('link');

			for (var i = 0; i < links.length; i++) {
				if (links[i].href && links[i].href.indexOf(caminhoArquivo) !== -1) {
					links[i].parentNode.removeChild(links[i]);
					break;  // Saia do loop após remover o primeiro link encontrado
				}
			}
		}

		function darkMode() {
			if($('body').hasClass('dark')) {
				$('.mode-text').text("Light mode");
				importarCSS("<?= $this->Url->build('/webroot/css/dark-mode.css', ['fullBase' => true]) ?>");
				var ativarDarkmode = 1;
			} else {
				$('.mode-text').text("Dark mode");
				desimportarCSS("<?= $this->Url->build('/webroot/css/dark-mode.css', ['fullBase' => true]) ?>");
				var ativarDarkmode = 0;
			}

			<?php //if($currentController == 'Relatorios' && $currentAction == 'index') { ?>
				//darModeGraficos(ativarDarkmode);
			<?php //} ?>

			$.ajax({
				url: "<?= Router::url(['controller' => 'users', 'action' => 'atualizarDarkmode']);?>",
				type: 'POST',
				dataType: 'json',
				data: { darkmode: ativarDarkmode },
				success: function(response) {
					console.log('Dark mode atualizado com sucesso!');
				},
				error: function(xhr, status, error) {
					console.error('Erro na solicitação AJAX:', error);
				}
			});
		}

		$(document).ready(function() {
			darkMode();
		});
	// Datatable 
		var datatableOptions = {
			"pageLength": 10,
			"language": {
				"sProcessing":    "Procesando...",
				"sLengthMenu":    "Mostrar _MENU_ registros",
				"sZeroRecords":   "Nenhum registro encontrado",
				"sEmptyTable":    "Nenhum dado disponível",
				"sInfo":          "Mostrando registros de _START_ até _END_ de um total de _TOTAL_ registros",
				"sInfoEmpty":     "Mostrando registros de 0 a 0 de um total de 0 registros",
				"sInfoFiltered":  "(filtrado de um total de _MAX_ registros)",
				"sInfoPostFix":   "",
				"sSearch":        "Buscar:",
				"sUrl":           "",
				"sInfoThousands":  ",",
				"sLoadingRecords": "Carregando...",
				"oPaginate": {
					"sFirst":    "<<",
					"sLast":    ">>",
					"sNext":    ">",
					"sPrevious": "<"
				},
				"oAria": {
					"sSortAscending":  ": Ordem Ascendente",
					"sSortDescending": ": Ordem descendente"
				},
			}
		};

		var datatableOptionsLanguage = {
			"sProcessing":    "Procesando...",
			"sLengthMenu":    "Mostrar _MENU_ registros",
			"sZeroRecords":   "Nenhum registro encontrado",
			"sEmptyTable":    "Nenhum dado disponível",
			"sInfo":          "Mostrando registros de _START_ até _END_ de um total de _TOTAL_ registros",
			"sInfoEmpty":     "Mostrando registros de 0 a 0 de um total de 0 registros",
			"sInfoFiltered":  "(filtrado de um total de _MAX_ registros)",
			"sInfoPostFix":   "",
			"sSearch":        "Buscar:",
			"sUrl":           "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Carregando...",
			"oPaginate": {
				"sFirst":    "<<",
				"sLast":    ">>",
				"sNext":    ">",
				"sPrevious": "<"
			},
			"oAria": {
				"sSortAscending":  ": Ordem Ascendente",
				"sSortDescending": ": Ordem descendente"
			},
		};
	//
</script>
