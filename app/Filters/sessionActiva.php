<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class sessionActiva implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        
        if(!session('usuario') == ""){
            return redirect()->to(base_url('ad/home'));
        }

 // Do something here
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}