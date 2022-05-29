<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'student';
    protected $primeryKey= 'id';
    protected $allowedFields=['name','email','phone','image','created_at'];
}

?>