<?= $this->Html->css(['relatorios.css']); ?>

<style>
	.aproveitamento {
		background-color: <?= $echartBetsGreenRed['AproveitamentoCor'] ?>;
	}
	.aproveitamentoConversao {
		background-color: <?= $echartBetsConvertidas['AproveitamentoCor'] ?>;
	}
</style>
<!-- <div class="content"> -->
<div class="content content-relatorios">
	<div class="row row-title">
		<div class="col-2">
			<div class="card-title-">
				<img src="caminho_para_seu_logo.png" alt="Logo">
			</div>
		</div>
		<div class="col-8">
			<p class="card-title-destaques"> DESTAQUES </p>
			<p class="card-title-mes"> JANEIRO </p>
		</div>
		<div class="col-2">
			<div class="card-title-ano">
				<div class="card-title-ano-triangulo"></div>
				<p> 2024 </p>
			</div>
		</div>
	</div>
	<div class="row row-pontos">
		<div class="col-10"></div>
		<div class="col-2 col-pontos"> Pontos </div>
	</div>
	<div class="row row-destaques row-gold">
		<div class="col-1 col-class">
			1
		</div>
		<div class="col-1 col-foto">
			<img src="caminho_para_seu_logo.png" alt="Foto">
		</div>
		<div class="col-8 col-nome">
			Luiz Fernando Simas Oliveira
			<div class="barra-porcentagem" data-porcentagem="30"></div>
			<span class="col-nome-pct"> 30% </span>
		</div>
		<div class="col-2 col-score">
			<div class="triangulo"></div>
			<p> 255 </p>
		</div>
	</div>
	<div class="row row-destaques row-silver">
		<div class="col-1 col-class">
			2
		</div>
		<div class="col-1 col-foto">
			<img src="caminho_para_seu_logo.png" alt="Foto">
		</div>
		<div class="col-8 col-nome">
			Luiz Fernando Simas Oliveira
			<div class="barra-porcentagem" data-porcentagem="30"></div>
			<span class="col-nome-pct"> 30% </span>
		</div>
		<div class="col-2 col-score">
			<div class="triangulo"></div>
			<p> 255 </p>
		</div>
	</div>
	<div class="row row-destaques row-bronze">
		<div class="col-1 col-class">
			3
		</div>
		<div class="col-1 col-foto">
			<img src="caminho_para_seu_logo.png" alt="Foto">
		</div>
		<div class="col-8 col-nome">
			Luiz Fernando Simas Oliveira
			<div class="barra-porcentagem" data-porcentagem="30"></div>
			<span class="col-nome-pct"> 30% </span>
		</div>
		<div class="col-2 col-score">
			<div class="triangulo"></div>
			<p> 255 </p>
		</div>
	</div>
	<div class="row row-destaques ">
		<div class="col-1 col-class">
			4
		</div>
		<div class="col-1 col-foto">
			<img src="caminho_para_seu_logo.png" alt="Foto">
		</div>
		<div class="col-8 col-nome">
			Luiz Fernando Simas Oliveira
			<div class="barra-porcentagem" data-porcentagem="30"></div>
			<span class="col-nome-pct"> 30% </span>
		</div>
		<div class="col-2 col-score">
			<div class="triangulo"></div>
			<p> 255 </p>
		</div>
	</div>
	<div class="row row-destaques ">
		<div class="col-1 col-class">
			5
		</div>
		<div class="col-1 col-foto">
			<img src="caminho_para_seu_logo.png" alt="Foto">
		</div>
		<div class="col-8 col-nome">
			Luiz Fernando Simas Oliveira
			<div class="barra-porcentagem" data-porcentagem="30"></div>
			<span class="col-nome-pct"> 30% </span>
		</div>
		<div class="col-2 col-score">
			<div class="triangulo"></div>
			<p> 255 </p>
		</div>
	</div>
	<div class="row row-destaques ">
		<div class="col-1 col-class">
			6
		</div>
		<div class="col-1 col-foto">
			<img src="caminho_para_seu_logo.png" alt="Foto">
		</div>
		<div class="col-8 col-nome">
			Luiz Fernando Simas Oliveira
			<div class="barra-porcentagem" data-porcentagem="30"></div>
			<span class="col-nome-pct"> 30% </span>
		</div>
		<div class="col-2 col-score">
			<div class="triangulo"></div>
			<p> 255 </p>
		</div>
	</div>
	<div class="row row-destaques ">
		<div class="col-1 col-class">
			7
		</div>
		<div class="col-1 col-foto">
			<img src="caminho_para_seu_logo.png" alt="Foto">
		</div>
		<div class="col-8 col-nome">
			Luiz Fernando Simas Oliveira
			<div class="barra-porcentagem" data-porcentagem="30"></div>
			<span class="col-nome-pct"> 30% </span>
		</div>
		<div class="col-2 col-score">
			<div class="triangulo"></div>
			<p> 255 </p>
		</div>
	</div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const barrasPorcentagem = document.querySelectorAll(".barra-porcentagem");

  barrasPorcentagem.forEach(barraPorcentagem => {
    const porcentagem = parseInt(barraPorcentagem.getAttribute("data-porcentagem"));

    for (let i = 0; i < 50; i++) {
      const quadradinho = document.createElement("div");
      quadradinho.classList.add("quadradinho");

      if (i < porcentagem / 2) {
        quadradinho.style.backgroundColor = "#00ff00"; /* Verde para quadradinhos correspondentes à porcentagem */
      }

      barraPorcentagem.appendChild(quadradinho);
    }
  });
});
</script>