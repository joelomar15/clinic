<?php
namespace App\Models;
use CodeIgniter\Model;

class OfertaModel extends Model
{
    protected $table = 'ofertas';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_producto', 'porcentaje','descripcion','estado'];
    

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
}
?>