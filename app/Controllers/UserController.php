<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class UserController extends ResourceController
{
    protected $modelName = 'App\Models\User';
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
            'data_user' => $this->model->getAll()
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
        $data = [
            'message' => 'success',
            'user_byid' => $this->model->find($id)
        ];

        if( $data['user_byid']== null){
            return $this->failNotFound('Data Pegawai Tidak Ditemukan');
        }

        return $this->respond($data, 200);
    }


    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $rules = $this->validate([
            'name_user'  =>  'required',
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
            'name_user' => esc($this->request->getVar('name_user')),
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
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $rules = $this->validate([
            'name_user'  =>  'required',
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


        $this->model->update($id, [
            'name_user' => esc($this->request->getVar('name_user')),
            'email' => esc($this->request->getVar('email')),
            'contact' => esc($this->request->getVar('contact')),
            'password' => esc(md5($this->request->getVar('password'))),
            'was_born' => esc($this->request->getVar('was_born')),
            'total_point' => esc(md5($this->request->getVar('total_point'))),
            'address' => esc($this->request->getVar('address')),
            'avatar' => esc($this->request->getVar('avatar')),
        ]);

        $response =[
            'message' => 'Data berhasil dirubah'
        ];

        return $this->respond($response, 200);
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
        $this->model->delete($id);

        $response =[
            'message' => 'Data berhasil dihapus'
        ];

        return $this->respondDeleted($response);
    }
}
