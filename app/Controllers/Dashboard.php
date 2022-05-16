<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Models\PostsModel;
use App\Models\CategoriesModel;
use App\Models\NewsletterModel;
use App\Models\CommentsModel;
use DateTime;

class Dashboard extends BaseController {
    public function index() {
        $this->loadViews("index");
    }

    public function uploadPost() {

        //Load Categories
        $model = new CategoriesModel();
        $data['categories'] = $model->findAll();

        $postmodel = new PostsModel();

        helper(array("url", "form"));
        $validation = \Config\Services::validation();

        $validation->setRules(
            array(
                "title" => "Required",
                "intro" => "Required",
                "content" => "Required|min_length[5]",
                "category" => "Required",
            ),
            array(
                "title" => array(
                    "Required" => "El titulo es requerido, por favor reviselo"
                ),
                "intro" => array(
                    "Required" => "La intro es requerida, por favor revisela"
                ),
                "content" => array(
                    "Required" => "El contenido es requerido, por favor reviselo",
                    "min_length" => "Minimo 50 caracteres"
                ),
                "category" => array(
                    "Required" => "La categoría es requerida, por favor revisela"
                ),
            )
        );

        if ($_POST) {
            if (!$validation->withRequest($this->request)->run()) {
                $errors = $validation->getErrors();
                $data['error'] = true;
            } else {
                $file = $this->request->getFile("banner");
                $filename = $file->getRandomName();
                if ($file->isValid()) {
                    $file->move(ROOTPATH . "/public/uploads", $filename);
                }
                $_POST['banner'] = $filename;
                $_POST['slug'] = url_title($_POST['title']);
                $_POST['created_at'] = date('Y-m-d');

                $postmodel->insert($_POST);
            }
        }

        $this->loadViews("uploadPost", $data);
    }

    public function category($id=null) {
        $postsmodel = new PostsModel();
        $categorymodel = new CategoriesModel();
        $data['category'] = $categorymodel->where("id",$id)->findAll();
        $data['posts'] = $postsmodel->where("category",$id)->findAll();

        lm($data);
        $this->loadViews("category",$data);
    }

    public function add_newsletter() {
        if (isset($_POST['email'])) {
            $newslettermodel = new NewsletterModel();
            $emails = $newslettermodel->where("email", $_POST['email'])->findAll();

            if ($emails) {
                echo "El email ya existe";
            } else {
                $id = $newslettermodel->insert($_POST);
                echo "Bienvenido a nuestro Newsletter" . $id;
            }
        }
    }

    public function post($slug = null, $id = null) {
        if ($slug && $id) {
            $commentsModel = new CommentsModel();
            $postsmodel = new PostsModel();
            $categorymodel = new CategoriesModel();
            $data['comments'] = $commentsModel->where("post_id",$id)->findAll();
            $data['countcomments'] = $commentsModel->where("post_id",$id)->countAll();

            if ($_POST) {
                helper(array("url", "form"));

                $validation = \Config\Services::validation();
                $validation->setRules(
                    array(
                        "cName" => "Required",
                        "cEmail" => "Required",
                        "cMessage" => "Required|min_length[15]",
                    ),
                    array(
                        "cName" => array(
                            "Required" => "El Nombre es requerido, por favor reviselo"
                        ),
                        "cEmail" => array(
                            "Required" => "El Email es requerida, por favor reviselo"
                        ),
                        "cMessage" => array(
                            "Required" => "El contenido es requerido, por favor reviselo",
                            "min_length" => "Minimo 15 caracteres"
                        ),
                    )
                );

                if(!$validation->withRequest($this->request)->run()){
                    echo "error";
                }else {
                    echo "success";
                    $arraycomment=array(
                        "name" => $_POST['cName'],
                        "email" => $_POST['cEmail'],
                        "comment" => $_POST['cMessage'],
                        "post_id" => $id
                    );
                    $commentsModel->insert($arraycomment);
                }
            }
            
            $post = $postsmodel->where("id", $id)->findAll();
            $data['post'] = $post;
            $data['categories'] = $categorymodel->where("id", $post[0]['category'])->findAll();
            $data['previouspost'] = $postsmodel->traerPosts();
        }
        $this->loadViews("post", $data);
    }

    public function loadViews($view = null, $data = null) {
        if ($data) {
            $data['view'] = $view;
            echo view("includes/header", $data);
            echo view($view, $data);
            echo view("includes/footer", $data);
        } else {
            echo view("includes/header");
            echo view($view);
            echo view("includes/footer");
        }
    }
}
