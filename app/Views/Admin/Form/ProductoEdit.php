<?php echo $this->extend('Plantilla/tema'); ?>
<?php echo $this->section("contenedor"); ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<div class="">
	<div class="row mb-3">
		<div class="col-12">
			<a href="<?= base_url() ?>ad/producto" class="btn btn-info"><i class="fa fa-arrow-left"></i> Regresar</a>
		</div>
	</div>
	<form role="form" action="<?= base_url('ad/producto/' . $producto['id']) ?>" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="PUT">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header bg-info text-white">Datos del Producto</div>
					<div class="card-body">
						<div class="form-group">
							<label for="nombre">Nombre:</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-shopping-cart"></i></span>
								</div>
								<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo set_value('nombre',$producto['nombre']) ?>">
							</div>
							<small class="text-danger"><?php echo validation_show_error('nombre'); ?></small>
						</div>
						<div class="form-group">
							<label for="descripcion">Descripción:</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-comment"></i></span>
								</div>
								<input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo set_value('descripcion',$producto['descripcion']) ?>">
							</div>
							<small class="text-danger"><?php echo validation_show_error('descripcion'); ?></small>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header bg-info text-white">Datos del Producto</div>
					<div class="card-body">
						<div class="form-group">
							<label for="valor">Precio:</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-dollar"></i></span>
								</div>
								<input type="text" class="form-control" id="valor" name="valor" value="<?php echo set_value('valor',$producto['valor']) ?>">
							</div>
							<small class="text-danger"><?php echo validation_show_error('valor'); ?></small>
						</div>
						<div class="form-group">
							<label for="foto">Cargar Fotografía (jpeg, jpg, png):</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="foto" name="foto" accept="image/jpeg, image/png, image/jpg">
								<label class="custom-file-label" for="foto">
									<?php echo old('foto') ? 'Archivo cargado previamente no válido, seleccione nuevamente' : 'Seleccione archivo'; ?>
								</label>
							</div>
							<small class="text-danger"><?php echo validation_show_error('foto'); ?></small>
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

<script>
	// Actualizar texto del label cuando se selecciona un archivo
	document.querySelector('.custom-file-input').addEventListener('change', function(e) {
		const fileName = e.target.files[0] ? e.target.files[0].name : "Seleccione archivo";
		e.target.nextElementSibling.textContent = fileName;
	});
</script>
<!-- /.row -->

<?php echo $this->endSection(); ?>


<?php echo $this->section("scripts"); ?>


</body>

</html>

<?php echo $this->endSection(); ?>