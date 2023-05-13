<?php

namespace App\Http\Controllers;

class ExampleController extends Controller {

    private $data = [
        [
            'id' => 'CUS001',
            'name' => 'Agus',
            'address' => 'Bekasi'
        ],
        [
            'id' => 'CUS002',
            'name' => 'Budi',
            'address' => 'Jakarta'
        ],
        [
            'id' => 'CUS003',
            'name' => 'Charlie',
            'address' => 'Bandung'
        ]
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    public function showListCustomers() {

        return [
            'status' => 200,
            'success' => true,
            'data' => $this->data
        ];
    }

    public function getCustomerByID($id) {
        foreach ($this->data as $d) {
            if ($d['id'] == $id) {
                return [
                    'status' => 200,
                    'success' => true,
                    'customer' => $d
                ];
            }
        }
        return [
                    'status' => 401,
                    'success' => false,
                    'message' => 'Data not found!'
                ]; 
    }

}
