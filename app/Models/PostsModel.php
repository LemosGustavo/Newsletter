<?php

namespace App\Models;

use CodeIgniter\Model;

class PostsModel extends Model {
    protected $table = "posts";
    protected $primaryKey = "id";

    protected $returnType = "array";
    protected $useSoftDeletes = true;
    protected $deletedField  = 'deleted';

    protected $allowedFields = array("banner", "title", "intro", "content", "category", "tags", "slug", "created_at", "created_by");

    public function traerPosts() {
        return $this->db->query("SELECT * FROM posts order by RAND() LIMIT 2")->getResult();
    }
}
