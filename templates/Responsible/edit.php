<div class="col-md-12 content">
	<h3> <?= $title ?> </h3>
	<div class="card" >
		<div class="card-body">
			<?= $this->Form->create($responsible, ['class' => 'form-material  mt-2']) ?>
				<div class="row">
					<div class="col-xl-3 col-lg-4 col-md-6 col-sm-8 col-xs-12">
						<label class="control-label text-muted"> Nome </label>
						<?= $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira o nome']) ?>
					</div>
					<div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<label class="control-label text-muted"> RG </label>
						<?= $this->Form->control('rg', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira a cor']) ?>
					</div>
					
				</div>
				<div class="row">
					<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label class="control-label text-muted"> Fone </label>
						<?= $this->Form->control('phone', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Insira o fone']) ?>
					</div>
					<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label class="control-label text-muted"> Função Social </label>
						<?= $this->Form->control('socialfunction', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Insira a função']) ?>
					</div>
					<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label class="control-label text-muted"> E-mail </label>
						<?= $this->Form->control('email', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira o e-mail']) ?>
					</div>
					<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label class="control-label text-muted"> Usuário </label>
						<?= $this->Form->control('iduser', ['class' => 'form-control form-control selectpicker', 'data-live-search', 'label' => false, 'options' => $users, 'title' => 'Selecione o usuário']) ?>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-12">
						<label class="control-label text-muted"> Status </label>
						<?=  $this->Form->input('inactive', ['label' => ['class' => 'control-label'], 'type' => 'radio', 'options' => [0 => 'Ativo', 1 => 'Inativo']]); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?= $this->Form->button('Salvar respnsável', ['class' => 'btn btn-success btn-lg']) ?>
					</div>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>
<script>
	$("#phone").mask("(99) 99999-9999");
</script>