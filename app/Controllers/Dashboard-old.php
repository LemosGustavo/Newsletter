<?php

namespace App\Controllers;

class DashboardOld extends BaseController
{
    public function index()
    {
        $data['mydata1'] = "Testing1";
        $data['mydata2'] = "Testing2";
       return view('form',$data);
    }
    public function helloWorld($slug = null, $id = null)
    {
        echo $slug."<br>";
        echo $id."<br>";
    }

    public function template()
    {
        $parser = \Config\Services::parser();
        $data=[
            'title'=>'My website Title!',
            'content'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, voluptas vel hic recusandae labore repellendus nihil. Earum, eligendi dolorem iste in obcaecati atque laborum voluptatem nostrum quibusdam, nihil nam tenetur.',
            'footer'=>' goodbye!'
        ];

        echo $parser->setData($data)->render('template');
    }
}
