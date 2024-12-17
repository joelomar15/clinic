<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\ClienteModel;
use App\Models\OfertaModel;
use App\Models\ReservaModel;

class HomeController extends BaseController
{
    private $productoModel;
    private $clienteModel;
    private $ofertaModel;
    private $reservaModel;
    public function __construct()
    {
        $this->productoModel = new ProductoModel();
        $this->clienteModel = new ClienteModel();
        $this->ofertaModel = new OfertaModel();
        $this->reservaModel = new ReservaModel();
    }

    public function index(): string
    {
        $result = $this->productoModel->query("
        SELECT 
            SUM(CASE WHEN estado = 0 THEN 1 ELSE 0 END) AS inactivos,
            SUM(CASE WHEN estado = 1 THEN 1 ELSE 0 END) AS activos
        FROM productos
        ");
        $producto = $result->getRowArray();

        $result2 = $this->clienteModel->query("
        SELECT 
            SUM(CASE WHEN estado = 0 THEN 1 ELSE 0 END) AS inactivos,
            SUM(CASE WHEN estado = 1 THEN 1 ELSE 0 END) AS activos
        FROM clientes
        ");
        $cliente = $result2->getRowArray();

        $result3 = $this->ofertaModel->query("
        SELECT 
            SUM(CASE WHEN estado = 0 THEN 1 ELSE 0 END) AS inactivos,
            SUM(CASE WHEN estado = 1 THEN 1 ELSE 0 END) AS activos
        FROM ofertas 
        ");
        $oferta = $result3->getRowArray();

        $result4 = $this->reservaModel
            ->select('reservas.fecha AS fecha_Reserva, d.cedula AS cedula_Doctor, d.nombre AS nombre_Doctor, c.cedula AS cedula_Cliente, c.nombre AS nombre_Cliente, reservas.hora AS hora_Reserva, h.hora_inicio AS hora_Inicio, h.hora_fin AS hora_Fin, reservas.estado AS estado_Reserva')
            ->join('asignacion a', 'reservas.id_asignacion = a.id')
            ->join('doctores d', 'a.id_doctor = d.id')
            ->join('clientes c', 'reservas.id_cliente = c.id')
            ->join('horarios h', 'a.id_horario = h.id')
            ->where('d.cedula', session('cedula'))
            ->where('reservas.fecha >=', date('Y-m-d', strtotime('-1 month')))  // Fecha 1 mes atrás
            ->where('reservas.fecha <=', date('Y-m-d', strtotime('+1 month')))  // Fecha 1 mes adelante
            ->groupBy('reservas.fecha, reservas.hora, c.cedula, d.cedula')
            ->orderBy('reservas.fecha, reservas.hora')
            ->findAll();



        $cabecera = ['titulo' => 'Home', 'tipo' => 'Home', 'producto' => $producto, 'cliente' => $cliente, 'oferta' => $oferta, 'reserva' => $result4];
        return view('Admin/home', $cabecera);
    }
}
