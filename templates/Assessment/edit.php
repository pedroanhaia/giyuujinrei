<div class="col-md-12 content">
	<div class="card" >
		<div class="card-body">
			<?= $this->Form->create($assessment, ['class' => 'form-material  mt-2']) ?>
				<div class="row">
					<div class="col-lg-3 col-md-12">
						<div class="form-group">
							<label class="control-label text-muted"> Índice </label>
							<?= $this->Form->control('idindex', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira o índice']) ?>
						</div>
					</div>
					<div class="col-lg-3 col-md-12">
						<label class="control-label text-muted"> Professor </label>
						<?= $this->Form->control('idteacher', ['class' => 'form-control ', 'label' => false, 'required' => true, 'options' => $professores, 'title' => 'Selecione o professor']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2 col-md-12">
						<div class="form-group">
							<label class="control-label text-muted"> Estudante </label>
							<?= $this->Form->control('idstudent', ['class' => 'form-control ', 'label' => false, 'required' => true, 'options' => $estudantes, 'title' => 'Selecione o estudante']) ?>
						</div>
					</div>
					<div class="col-lg-2 col-md-12">
						<div class="form-group">
							<label class="control-label text-muted"> Valor </label>
							<?= $this->Form->control('value', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira o valor']) ?>
						</div>
					</div>
					<div class="col-lg-4 col-md-12">
						<div class="form-group">
							<label class="control-label text-muted"> Calendário </label>
							<?= $this->Form->control('idschedule', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira o idschedule']) ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-12">
						<div class="form-group">
							<label class="control-label text-muted"> Role </label>
							<?= $this->Form->control('role', ['class' => 'form-control', 'label' => false, 'required' => true, 'options' => C_RolesOptions]) ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?= $this->Form->button('Salvar conta', ['class' => 'btn btn-success btn-lg']) ?>
					</div>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>

