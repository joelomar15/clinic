<?php echo $this->extend('Plantilla/tema'); ?>
<?php echo $this->section("contenedor"); ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<div class="">
	<div class="row mb-3">
		<div class="col-12">
			<a href="<?= base_url() ?>ad/horario" class="btn btn-info"><i class="fa fa-arrow-left"></i> Regresar</a>
		</div>
	</div>
	<form role="form" action="<?= base_url('ad/horario/' . $horario['id']) ?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="_method" value="PUT">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header bg-info text-white">Hora de Inicio</div>
					<div class="card-body">
						<div class="form-group">
							<label for="hora_inicio">Inicio:</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-clock"></i></span>
								</div>
								<input type="time" class="form-control" id="hora_inicio" name="hora_inicio" value="<?php echo set_value('hora_inicio', $horario['hora_inicio']) ?>">
							</div>
							<small class="text-danger"><?php echo validation_show_error('hora_inicio'); ?></small>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header bg-info text-white">Hora de Fin</div>
					<div class="card-body">
						<div class="form-group">
							<label for="hora_fin">Fin:</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-clock"></i></span>
								</div>
								<input type="time" class="form-control" id="hora_fin" name="hora_fin" value="<?php echo set_value('hora_fin', $horario['hora_fin']) ?>">
							</div>
							<small class="text-danger"><?php echo validation_show_error('hora_fin'); ?></small>
						</div>
					</div>
				</div>
				<div class="text-center mt-3">
					<button type="submit" class="btn btn-info"><i class="fa fa-plus"></i> Actualizar Registro</button>
				</div>
			</div>
		</div>
	</form>
</div>

<!-- /.row -->

<?php echo $this->endSection(); ?>


<?php echo $this->section("scripts"); ?>


</body>

</html>

<?php echo $this->endSection(); ?>