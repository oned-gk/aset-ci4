<?php 
namespace App\Models;
use CodeIgniter\Model;

class TiangModel extends Model
{
    protected $table = 'tiang';
    protected $allowedFields = ['no_tiang','latitude','longitude','foto'];

    public function getTiang(int $id_tiang = null)
    {
        if ($id_tiang === null)
        {
            return $this->findAll();
        }
        return $this->where(['id_tiang'=>$id_tiang])->find();
    }    

}