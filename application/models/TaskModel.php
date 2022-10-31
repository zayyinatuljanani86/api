<?php

class TaskModel extends CI_Model
{
    //Model untuk tasks
    public function getTasks($id = null)
    {
        if ($id === null) {
            return $this->db->get('tasks')->result_array();
        } else {
            return $this->db->get_where('tasks', ['id' => $id])->result_array();
        }
    }
    public function postTasks($data)
    {
        $this->db->insert('tasks', $data);
        return $this->db->affected_rows();
    }
    public function putTasks($data, $id)
    {
        $this->db->update('tasks', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
    public function deleteTasks($id)
    {
        $this->db->delete('tasks', ['id' => $id]);
        return $this->db->affected_rows();
    }

    //Model untuk task_categories
    public function getCategory($id = null)
    {
        if ($id === null) {
            return $this->db->get('task_categories')->result_array();
        } else {
            return $this->db->get_where('task_categories', ['id' => $id])->result_array();
        }
    }
    public function postCategory($data)
    {
        $this->db->insert('task_categories', $data);
        return $this->db->affected_rows();
    }
    public function putCategory($data, $id)
    {
        $this->db->update('task_categories', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
    public function deleteCategory($id)
    {
        $this->db->delete('task_categories', ['id' => $id]);
        return $this->db->affected_rows();
    }
}
