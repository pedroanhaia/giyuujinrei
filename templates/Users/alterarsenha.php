<div class="col-md-12 content">
	<h3> <?= $title ?> </h3>
	<div class="card" >
		<div class="card-body">
			<?= $this->Form->create($user, ['class' => 'form-material  mt-2']) ?>
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
						<label class="control-label text-muted"> Insira a sua nova senha </label>
						<?= $this->Form->password('password1', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Insira a senha']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
						<label class="control-label text-muted"> Confirmar senha </label>
						<?= $this->Form->password('password2', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Confirme a senha']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?= $this->Form->button('Atualizar senha', ['class' => 'btn btn-success btn-lg']) ?>
					</div>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>