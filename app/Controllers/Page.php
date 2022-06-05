<?php
namespace App\Controllers;

class Page extends BaseController
{
  public function view($page = 'home')
  {
    if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
        // Whoops, we don't have a page for that!
        throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
    }
    $data['title'] = ucfirst($page); 
    $data['active'] = $page; // Capitalize the first letter

    $view = \Config\Services::renderer();
    $view->setData($data);
    helper('html');
    echo $view->render('template/header');
    echo $view->render('pages/' . $page);
    echo $view->render('template/footer');
  }
}