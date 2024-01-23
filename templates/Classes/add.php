<div class="col-md-12 content">
	<h3> <?= $title ?> </h3>
	<div class="card" >
		<div class="card-body">
			<?= $this->Form->create($class, ['class' => 'form-material  mt-2']) ?>
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
						<label class="control-label text-muted"> Nome </label>
						<?= $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira o nome']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
						<label class="control-label text-muted"> Dojô </label>
						<?= $this->Form->control('idcore', ['class' => 'form-control selectpicker', 'data-live-search', 'label' => false, 'required' => true, 'options' => $cores, 'title' => 'Selecione o dojo']) ?>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
						<label class="control-label text-muted"> Esporte </label>
						<?= $this->Form->control('idsport', ['class' => 'form-control selectpicker', 'data-live-search', 'label' => false, 'required' => true, 'options' => $sports, 'title' => 'Selecione o esporte']) ?>
					</div>
					<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
						<label class="control-label text-muted"> Professores </label>
						<?= $this->Form->control('teachers._ids', ['class' => 'form-control selectpicker', 'multiple', 'data-live-search', 'label' => false, 'required' => true, 'options' => $teachers, 'title' => 'Selecione os professores']) ?>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-md-12">
						<?= $this->Form->button('Salvar turma', ['class' => 'btn btn-success btn-lg']) ?>
					</div>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>