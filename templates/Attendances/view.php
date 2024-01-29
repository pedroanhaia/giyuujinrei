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
					<thead>
						<tr>
							<th width='80%'> Estudante </th>
							<th> Presença </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($schedule->attendances as $reg) { ?>
							<tr>
								<td class="tdPresenca"> <?= $reg->student->name ?> </td>
								<td><input disabled type="checkbox" id="student<?= $reg->id ?>" name="attendance[<?= $reg->idstudent ?>]" value="<?= $reg->present ?>" <?= $reg->present ? 'checked' : '' ?>><input type="hidden" name="attendance[<?= $reg->idstudent ?>]" value="<?= $reg->present ?>"></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>