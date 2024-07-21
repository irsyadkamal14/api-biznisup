<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class MentorController extends ResourceController
{
    protected $modelName = 'App\Models\Mentor';
    protected $format = 'json';
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data = [
            'message' => 'success',
            'data_mentor' => $this->model->findAll()
        ];

        return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    
    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $rules = $this->validate([
            'name_mentor'  =>  'required',
            'email'      =>  'required',
            'contact'    =>  'required',
            'password'   =>  'required',
            'address'    =>  'required',
        ]);

        if (!$rules){
            $response = [
                'message' => $this->validator->getErrors()
            ];

            return $this->failValidationErrors($response);
        }


        $this->model->insert([
            'name_mentor' => esc($this->request->getVar('name_mentor')),
            'email' => esc($this->request->getVar('email')),
            'contact' => esc($this->request->getVar('contact')),
            'password' => esc(md5($this->request->getVar('password'))),
            'was_born' => esc($this->request->getVar('was_born')),
            'total_point' => esc(md5($this->request->getVar('total_point'))),
            'address' => esc($this->request->getVar('address')),
            'avatar' => esc($this->request->getVar('avatar')),
        ]);

        $response =[
            'message' => 'Data berhasil ditambahkan'
        ];

        return $this->respondCreated($response);
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
