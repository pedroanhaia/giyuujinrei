<?php
	use Cake\Routing\Router;
	echo $this->Html->css(['presenca.css']);
?>
<div class="col-md-12 content">
	<h3> <?= $title ?> </h3>
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<label class="control-label text-muted"> Turma: </label>
					<?= $schedule->class->name ?>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<label class="control-label text-muted"> Data: </label>
					<?= date_format($schedule->date, 'd/m/Y');  ?>
				</div>
			</div>
			<div class="div-content">
				<table id="studentTable">
					<div class="row row-title">
						<div class="col-9">
							<label for="Estudante" class="attendance-label"> Estudante </label>
						</div>
						<div class="col-3">
							<button class='btn btn-queequaseinfo' id="selectAll"> <i class="fa-regular fa-square-check"></i> </button>
						</div>
					</div>
					<div id="studentsList">
						<?php foreach($schedule->attendances as $reg) { ?>
							<div class="row row-student">
								<div class="col-9">
									<?= $reg->student->name ?>
								</div>
								<div class="col-3">
									<input disabled type="checkbox" id="student<?= $reg->id ?>" name="attendance[<?= $reg->idstudent ?>]" <?= $reg->present ? 'checked' : '' ?>>
								</div>
							</div>
						<?php } ?>
					</div>
				</table>
			</div>
		</div>
	</div>
</div>