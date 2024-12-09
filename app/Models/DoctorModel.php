<?php
namespace App\Models;
use CodeIgniter\Model;

class DoctorModel extends Model
{
    protected $table = 'doctores';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['cedula', 'nombre','direccion','telefono','correo', 'foto','clave','estado'];
    

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
}
?>