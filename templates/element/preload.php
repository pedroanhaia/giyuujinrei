<!DOCTYPE html>
<style>
	.overlay {
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: rgba(0, 0, 0, 0.7); /* Cor de fundo opaca */
		display: flex;
		justify-content: center;
		align-items: center;
		display: none; /* Inicialmente oculto */
		z-index: 9999; /* Valor alto para garantir que fique por cima de outros elementos */
		opacity: 0; /* Inicialmente transparente */
		transition: opacity 1s; /* Transição de 1 segundo para a propriedade opacity */
	}

	.overlay.show {
		opacity: 1; /* Ao adicionar a classe 'show', a opacidade torna-se 1 (fade-in) */
	}

	.centered-gif {
		max-width: 50%;
		max-height: 50%;
	}
</style>
<html lang="en">
	<body>
		<div class="overlay">
			<?php 
				if(isset($_SESSION['bLogin'])) {
					$arrLogos = ['/webroot/img/Logo 4 - Tinta.gif', "/webroot/img/Logo 5 - 3D (Site's edition).gif"];
					$img = $arrLogos[rand(0, 1)];
					$imgTimeout = 2800;
					unset($_SESSION['bLogin']);
				} else {
					$img = '/webroot/img/Logo 3d transparente.gif';
					$imgTimeout = 700;
				}
			?>
			<img src="<?= $this->Url->build($img, ['fullBase' => true]) ?>" alt="Logo" class="centered-gif">
		</div>
	</body>
</html>
<script>
	document.addEventListener('DOMContentLoaded', function() {
		var overlay = document.querySelector('.overlay');

		// Mostra a overlay quando a página é carregada
		overlay.style.display = 'flex';

		// Adiciona a classe 'show' para iniciar o fade-in
		overlay.classList.add('show');

		// Define um tempo limite de 1000 milissegundos (1 segundo)
		setTimeout(function() {
			// Remove a classe 'show' para iniciar o fade-out
			overlay.classList.remove('show');

			// Define um segundo temporizador para ocultar a overlay após o fade-out
			setTimeout(function() {
				overlay.style.display = 'none';
			}, <?= $imgTimeout ?>);
		}, <?= $imgTimeout ?>);
	});
</script>