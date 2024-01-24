<div class="col-md-12 content">
	<h3> <?= $title ?> </h3>
	<div class="card">
		<div class="card-body">
			<?= $this->Form->create($core, ['class' => 'form-material  mt-2']) ?>
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
						<label class="control-label text-muted"> Nome </label>
						<?= $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira o nome']) ?>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
						<label class="control-label text-muted"> Cidade </label>
						<?= $this->Form->control('city', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira a cidade']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
						<label class="control-label text-muted"> Tipo </label>
						<?= $this->Form->control('type', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira o tipo']) ?>
					</div>
					<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
						<label class="control-label text-muted"> Fone </label>
						<?= $this->Form->control('phone', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira o fone']) ?>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
						<label class="control-label text-muted"> E-mail </label>
						<?= $this->Form->control('email', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira o e-mail']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
						<label class="control-label text-muted"> Contato </label>
						<?= $this->Form->control('contact', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira o contato']) ?>
					</div>
					<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
						<label class="control-label text-muted"> Cargo </label>
						<?= $this->Form->control('positioncontact', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira o cargo do contato']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?= $this->Form->button('Salvar dojô', ['class' => 'btn btn-success btn-lg']) ?>
					</div>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>
<script>
	$("#phone").mask("(99) 99999-9999");
</script>