<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class CustomerCopyController extends Controller
{
    public function index()
    {
        return view('copy_data');
    }

    public function copyCustomers()
    {
        $db = Database::connect();

        // Optional: Clear existing data
        $db->query("TRUNCATE TABLE cberp_customers2");

        // Copy all records
        $db->query("
            INSERT INTO cberp_customers2
            SELECT * FROM cberp_customers
        ");

        return $this->response->setJSON([
            'status' => true,
            'message' => 'Customer data copied successfully'
        ]);
    }
}