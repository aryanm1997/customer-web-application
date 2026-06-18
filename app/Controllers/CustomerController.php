<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class CustomerController extends BaseController
{
    public function index()
    {
        return view('dashboard');
    }

    public function list()
    {
        $customers=(new CustomerModel())->findAll();

        return $this->response->setJSON([
            'data'=>$customers
        ]);
    }

    public function create()
    {
        return view('customers/customer_create');
    }

    public function store()
    {
        helper('url');
        
        (new CustomerModel())->insert([
            'name'=>$this->request->getPost('name'),
            'address'=>$this->request->getPost('address'),
            'city'=>$this->request->getPost('city'),
            'phone'=>$this->request->getPost('phone'),
            'postbox'=>$this->request->getPost('postbox'),
            'region'=>$this->request->getPost('region'),
            'company'=>$this->request->getPost('company'),
            'email'=>$this->request->getPost('email')
        ]);

        return redirect()->to(site_url('dashboard'));
    }

    public function edit($id)
    {
        $customer=(new CustomerModel())->find($id);

        return view('customers/customer_edit',
            compact('customer'));
    }

    public function update($id)
    {
        helper('url');
        
        (new CustomerModel())->update($id,[
            'name'=>$this->request->getPost('name'),
            'address'=>$this->request->getPost('address'),
            'city'=>$this->request->getPost('city'),
            'phone'=>$this->request->getPost('phone'),
            'postbox'=>$this->request->getPost('postbox'),
            'region'=>$this->request->getPost('region'),
            'company'=>$this->request->getPost('company'),
            'email'=>$this->request->getPost('email')
        ]);

        return redirect()->to(site_url('dashboard'));
    }
}