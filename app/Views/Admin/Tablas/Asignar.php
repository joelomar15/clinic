<?php echo $this->extend('Plantilla/tema'); ?>
<?php echo $this->section("contenedor"); ?>
<!-- /.box-header -->
<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="btn-group">
    <a id="link" href="<?= base_url() ?>ad/asignar/new" class="btn btn-info"><i class="fa fa-plus"></i> Agregar Nuevo</a>
</div>
<br><br>

<table id="example1" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Nº</th>
            <th>Doctor</th>
            <th>Horario</th>
            <th class="text-center">Estado</th>
            <th class="text-center">...</th>
        </tr>
    </thead>
    <tbody>
        <?php $cont = 0;
        foreach ($asignar as $hor):
            $cont++ ?>
            <tr>
                <td>
                    <?php echo $cont; ?>
                </td>
                <td>
                    <?php echo $hor["nombreDoctor"]; ?>
                </td>
                <td>
                    <?php echo $hor["hora_inicio"]." / ".$hor["hora_fin"]; ?>
                </td>
                <td class="text-center">
                    <?php if ($hor["estado"] > 0) { ?>
                        <a href="<?= base_url() ?>ad/asignar/delete/<?php echo $hor["id"]; ?>"
                            onclick="return confirm('¿Seguro que desea cambiar a estado (Inactivo) este registro?');" class="btn btn-success"><i
                                class="fa fa-toggle-on"></i></a>
                    <?php } else { ?>
                        <a href="<?= base_url() ?>ad/asignar/delete/<?php echo $hor["id"]; ?>"
                            onclick="return confirm('¿Seguro que desea cambiar a estado (Activo) este registro?');" class="btn btn-danger"><i
                                class="fa fa-toggle-off"></i></a>
                    <?php } ?>
                </td>
                <td class="text-center">
                    <a href="<?= base_url() ?>ad/asignar/<?php echo $hor["id"]; ?>/edit" class="btn btn-info"><i
                            class="fa fa-edit"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script>
    $('#example1').DataTable()
    $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
    })
</script>
<!-- /.box-body -->

<?php echo $this->endSection(); ?>