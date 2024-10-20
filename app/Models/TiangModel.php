<?php 
namespace App\Models;
use CodeIgniter\Model;

class TiangModel extends Model
{
    protected $table = 'tbl_tiang';
    protected $allowedFields = ['no_tiang','latitude','longitude','foto','kelurahan','kecamatan','kabupaten','provinsi','jalan'];
    protected $primaryKey = 'id'; 
    
    public function getTiang(int $id = null)
    {
        if ($id === null)
        {
            return $this->findAll();
        }
        return $this->where(['id'=>$id])->find();
    }    

}