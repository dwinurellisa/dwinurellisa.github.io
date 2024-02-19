<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'id'; // Ganti 'id' dengan nama kolom kunci utama yang sesuai
    public $timestamps = false;

    protected $fillable = ['namaRole'];

    public function getAllRoles()
    {
        return $this->all();
    }

    public function getNilaiByRole($id)
    {
        return $this->where('id', $id)->get();
    }

    public function getRoleById($id)
    {
        return $this->find($id);
    }

    public function insertRole($data)
    {
        return $this->create($data);
    }

    public function updateRole($id, $data)
    {
        return $this->where('id', $id)->update($data);
    }

    public function deleteRole($id)
    {
        return $this->where('id', $id)->delete();
    }
}
