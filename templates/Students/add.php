<div class="col-md-12 content">
	<div class="card" >
		<div class="card-body">
			<?= $this->Form->create($student, ['class' => 'form-material  mt-2']) ?>
				<div class="row">
					<div class="col-lg-3 col-md-12">
						<label class="control-label text-muted"> Nome </label>
						<?= $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira o nome']) ?>
					</div>
					<div class="col-lg-3 col-md-12">
						<label class="control-label text-muted"> Dojô </label>
						<?= $this->Form->control('idcore', ['class' => 'form-control ', 'label' => false, 'required' => true, 'options' => $cores, 'title' => 'Selecione o dojô']) ?>
					</div>
					<div class="col-lg-3 col-md-12">
						<label class="control-label text-muted"> Responsável </label>
						<?= $this->Form->control('idresponsible', ['class' => 'form-control ', 'label' => false, 'required' => true, 'options' => $responsibles, 'title' => 'Selecione o responsável']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2 col-md-12">
						<label class="control-label text-muted"> Fone </label>
						<?= $this->Form->control('phone', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Insira o fone']) ?>
					</div>
					<div class="col-lg-2 col-md-12">
						<label class="control-label text-muted"> Data de nascimento </label>
						<?= $this->Form->control('birthday', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Insira a data de nascimento']) ?>
					</div>
					<div class="col-lg-2 col-md-12">
						<label class="control-label text-muted"> Turma </label>
						<?= $this->Form->control('class', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Insira a turma']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2 col-md-12">
						<label class="control-label text-muted"> E-mail </label>
						<?= $this->Form->control('email', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Insira o e-mail']) ?>
					</div>
					<div class="col-lg-2 col-md-12">
						<label class="control-label text-muted"> Usuário </label>
						<?= $this->Form->control('iduser', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Insira o usuário']) ?>
					</div>
					<div class="col-lg-2 col-md-12">
						<label class="control-label text-muted"> Graduação </label>
						<?= $this->Form->control('idgrank', ['class' => 'form-control ', 'label' => false, 'required' => true, 'options' => $ranks, 'title' => 'Selecione a graduação']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-12">
						<label class="control-label text-muted"> Role </label>
						<?= $this->Form->control('role', ['class' => 'form-control', 'label' => false, 'required' => true, 'options' => C_RolesOptions]) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?= $this->Form->button('Salvar estudante', ['class' => 'btn btn-success btn-lg']) ?>
					</div>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>
<script>
	$("#phone").mask("(99) 99999-9999");
</script>