<?php

namespace App\Models;
use CodeIgniter\Model;

class CategoriesModel extends Model{
    protected $table = "categories";
    protected $primaryKey = "id";

    protected $returnType = "array";
    protected $useSoftDeletes = true;
    protected $deletedField  = 'deleted';

    protected $allowedFields = array("name");
    
}
