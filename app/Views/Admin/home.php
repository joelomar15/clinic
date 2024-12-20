<?php echo $this->extend('Plantilla/tema'); ?>
<?php echo $this->section("contenedor"); ?>

<?php
$fecha_actual = date('Y-m-d');

$fechaAnterior = '';
?>
<style>
    .bg-orange {
        background-color: #FF8800;
        /* Naranja oficial de SoundCloud */
        color: #fff;
    }

    .btnCitas {
        margin: 1% 1% 0 1%;
    }
</style>
<div class="row column1 social_media_section">
    <div class="col-md-6 col-lg-3">
        <div class="full socile_icons fb margin_bottom_30">
            <div class="social_icon text-white">
                <i class="fa fa-user-md"></i>
            </div>
            <div class="social_cont">
                <h4 class="text-center">Tus Citas Medicas (Hoy)</h4>
                <ul>
                    <li>
                        <span><strong><?= $reservaHoy['activos']; ?></strong></span>
                        <span>Activos</span>
                    </li>
                    <li>
                        <span><strong><?= $reservaHoy['inactivos']; ?></strong></span>
                        <span>Inactivo</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="full socile_icons tw margin_bottom_30">
            <div class="social_icon text-white">
                <i class="fa fa-users"></i>
            </div>
            <div class="social_cont">
                <h4 class="text-center">Clientes</h4>
                <ul>
                    <li>
                        <span><strong><?= $cliente['activos']; ?></strong></span>
                        <span>Activos</span>
                    </li>
                    <li>
                        <span><strong><?= $cliente['inactivos']; ?></strong></span>
                        <span>Inactivo</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="full socile_icons linked margin_bottom_30">
            <div class="social_icon text-white">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="social_cont">
                <h4 class="text-center">Productos</h4>
                <ul>
                    <li>
                        <span><strong><?= $producto['activos']; ?></strong></span>
                        <span>Activos</span>
                    </li>
                    <li>
                        <span><strong><?= $producto['inactivos']; ?></strong></span>
                        <span>Inactivo</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="full socile_icons soundcloud margin_bottom_30">
            <div class="social_icon bg-orange text-white">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="social_cont">
                <h4 class="text-center">Ofertas</h4>
                <ul>
                    <li>
                        <span><strong><?= $oferta['activos']; ?></strong></span>
                        <span>Activos</span>
                    </li>
                    <li>
                        <span><strong><?= $oferta['inactivos']; ?></strong></span>
                        <span>Inactivo</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row column4 graph">
    <div class="col-md-12">
        <div class="full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Calendario de Citas</h2>
                    <div class="list_cont">
                        <p>Únicamente podrás ver tus citas programadas de hace 1 mes anterior y 1 mes posterior a la fecha actual.</p>
                    </div>
                </div>
            </div>
            <div class="full graph_revenue">
                <div class="row">
                    <div class="col-md-12">

                        <?php
                        // Obtener la fecha de hoy en el formato 'Y-m-d'
                        $fechaHoy = date('Y-m-d');

                        // Agrupar las reservas por fecha
                        $gruposPorFecha = [];
                        foreach ($reserva as $reservaDia) {
                            $fecha = $reservaDia['fecha_Reserva'];
                            $gruposPorFecha[$fecha][] = $reservaDia;
                        }

                        // Variable de control: existe la fecha actual o no
                        $fechaHoyExiste = array_key_exists($fechaHoy, $gruposPorFecha);

                        ?>

                        <div class="content testimonial">
                            <div id="testimonial_slider" class="carousel slide" data-ride="carousel" data-interval="false">
                                <!-- Indicadores del carrusel -->
                                <ol class="carousel-indicators">
                                    <?php
                                    $index = 0;
                                    foreach ($gruposPorFecha as $fecha => $reservas):
                                        $activeClass = ($fechaHoy == $fecha) ? 'active' : '';
                                    ?>
                                        <li data-target="#testimonial_slider" data-slide-to="<?php echo $index; ?>" class="<?php echo $activeClass; ?>"></li>
                                    <?php
                                        $index++;
                                    endforeach;

                                    // Agregar indicador especial si la fecha actual no existe
                                    if (!$fechaHoyExiste):
                                    ?>
                                        <li data-target="#testimonial_slider" data-slide-to="<?php echo $index; ?>" class="active"></li>
                                    <?php endif; ?>
                                </ol>

                                <!-- Wrapper para los elementos del carrusel -->
                                <div class="carousel-inner">
                                    <?php
                                    $index = 0;
                                    foreach ($gruposPorFecha as $fecha => $reservas):
                                        $activeClass = ($fechaHoy == $fecha) ? 'active' : '';
                                    ?>
                                        <div class="carousel-item <?php echo $activeClass; ?>">
                                            <div class="dash_blog">
                                                <div class="dash_blog_inner">
                                                    <div class="dash_head text-center" style="background-color: #1e3c72; color: white; padding: 15px;">
                                                        <h3>
                                                            <i class="fa fa-calendar"></i>
                                                            <?php echo date('d F Y', strtotime($fecha)); ?>
                                                        </h3>
                                                    </div>
                                                    <div class="task_list_main">
                                                        <ul class="task_list list-unstyled">
                                                            <?php foreach ($reservas as $reserva): ?>
                                                                <li>
                                                                    <p href="#" style="color: #1e3c72; font-weight: bold;">
                                                                        Consulta con Dr. <?php echo $reserva['nombre_Doctor']; ?>
                                                                    </p>
                                                                    <strong>
                                                                        Pacinte <?php echo $reserva['nombre_Cliente']; ?> <br>
                                                                        <?php echo $reserva['hora_Inicio']; ?> a
                                                                        <?php echo $reserva['hora_Fin']; ?>
                                                                    </strong>
                                                                </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        $index++;
                                    endforeach;

                                    // Crear un div especial si no existe la fecha actual
                                    if (!$fechaHoyExiste):
                                    ?>
                                        <div class="carousel-item active">
                                            <div class="dash_blog">
                                                <div class="dash_blog_inner">
                                                    <div class="dash_head text-center" style="background-color: #1e3c72; color: white; padding: 15px;">
                                                        <h3>
                                                            <i class="fa fa-calendar"></i>
                                                            <?php echo date('d F Y', strtotime($fechaHoy)); ?>
                                                        </h3>
                                                    </div>
                                                    <div class="task_list_main">
                                                        <p class="text-center" style="color: #1e3c72; font-weight: bold; padding: 20px;">
                                                            No tienes citas programadas para el dia de hoy.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Controles del carrusel -->
                                <!-- Controles del carrusel -->
                                <a id="prevBtn" class="carousel-control left carousel-control-prev btnCitas" href="#testimonial_slider" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a id="nextBtn" class="carousel-control right carousel-control-next btnCitas" href="#testimonial_slider" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php echo $this->endSection(); ?>


<?php echo $this->section("scripts"); ?>

<script>

</script>

<?php echo $this->endSection(); ?>