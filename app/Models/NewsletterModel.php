<?php

namespace App\Models;
use CodeIgniter\Model;

class NewsletterModel extends Model{
    protected $table = "newsletter";
    protected $primaryKey = "id";

    protected $returnType = "array";
    protected $useSoftDeletes = true;
    protected $deletedField  = 'deleted';

    protected $allowedFields = array("email","added_at");
    
}
