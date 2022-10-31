<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class TaskManagement extends RestController
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('TaskModel');
    }
    //API CRUD untuk tabel tasks
    public function Tasks_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $task = $this->TaskModel->getTasks();
        } else {
            $task = $this->TaskModel->getTasks($id);
        }

        if ($task) {
            $this->response([
                'status' => true,
                'data' => $task
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }
    public function Tasks_post()
    {
        $data = [
            'category_id' => $this->post('category_id'),
            'title' => $this->post('title'),
            'description' => $this->post('description'),
            'start_date' => $this->post('start_date'),
            'finish_date' => $this->post('finish_date'),
            'status' => $this->post('status'),
        ];

        if ($this->TaskModel->postTasks($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Berhasil menambahkan data'
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal menambahkan data'
            ], 502);
        }
    }
    public function Tasks_put()
    {
        $id = $this->put('id');
        $data = [
            'category_id' => $this->put('category_id'),
            'title' => $this->put('title'),
            'description' => $this->put('description'),
            'start_date' => $this->put('start_date'),
            'finish_date' => $this->put('finish_date'),
            'status' => $this->put('status'),
        ];

        if ($this->TaskModel->putTasks($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Berhasil memperbarui data'
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal memperbarui data'
            ], 502);
        }
    }
    public function Tasks_delete()
    {
        $id = $this->delete('id');
        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'Mohon sertakan id!'
            ], 404);
        } else {
            if ($this->TaskModel->deleteTasks($id) > 0) {
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'Data berhasil dihapus'
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Silahkan periksa id kembali!'
                ], 404);
            }
        }
    }

    // API untuk CRUD task_categories
    public function Category_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $cat = $this->TaskModel->getCategory();
        } else {
            $cat = $this->TaskModel->getCategory($id);
        }

        if ($cat) {
            $this->response([
                'status' => true,
                'data' => $cat
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }
    public function Category_post()
    {
        $data = [
            'name' => $this->post('name'),
        ];

        if ($this->TaskModel->postCategory($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Berhasil menambahkan data kategori'
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal menambahkan data kategori'
            ], 502);
        }
    }
    public function Category_put()
    {
        $id = $this->put('id');
        $data = [
            'name' => $this->put('name'),
        ];

        if ($this->TaskModel->putCategory($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Berhasil memperbarui data'
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal memperbarui data'
            ], 502);
        }
    }
    public function Category_delete()
    {
        $id = $this->delete('id');
        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'Mohon sertakan id!'
            ], 404);
        } else {
            if ($this->TaskModel->deleteCategory($id) > 0) {
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'Data berhasil dihapus'
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Silahkan periksa id kembali!'
                ], 404);
            }
        }
    }
}
