<?php

class Model_users extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUserData($userId = null)
    {
        if ($userId) {
            $sql = "SELECT * FROM users WHERE id = ?";
            $query = $this->db->query($sql, array($userId));
            return $query->row_array();
        }

        $sql = "SELECT * FROM users WHERE id != ? ORDER BY id DESC";
        $query = $this->db->query($sql, array(1));
        return $query->result_array();
    }

    public function getUserGroup($userId = null)
    {
        if ($userId) {
            $sql = "SELECT * FROM users_group WHERE users_id = ?";
            $query = $this->db->query($sql, array($userId));
            $result = $query->row_array();

            $group_id = $result['level_id'];
            $user_id = $result['users_id'];
            $data_user = $this->getUserData($user_id);

            if ($data_user['puskesmas_id'] == 0) {
                $g_sql = "SELECT id, nama_level FROM level WHERE  id = ?";
                $g_query = $this->db->query($g_sql, array($group_id));
            } else {
                $g_sql = "SELECT level.id, level.nama_level, puskesmas.nama_puskesmas FROM level JOIN puskesmas ON puskesmas.id = ? WHERE level.id = ?";
                $g_query = $this->db->query($g_sql, array($data_user['puskesmas_id'], $group_id));
            }

            $q_result = $g_query->row_array();
            return $q_result;
        }
    }

    public function create($data = '', $group_id = null)
    {

        if ($data && $group_id) {
            $create = $this->db->insert('users', $data);

            $user_id = $this->db->insert_id();

            $group_data = array(
                'users_id' => $user_id,
                'level_id' => $group_id
            );

            $group_data = $this->db->insert('users_group', $group_data);

            return ($create && $group_data) ? true : false;
        }
    }

    public function edit($data = array(), $id = null, $group_id = null)
    {
        $this->db->where('id', $id);
        $update = $this->db->update('users', $data);

        if ($group_id) {
            // user group
            $update_user_group = array('level_id' => $group_id);
            $this->db->where('users_id', $id);
            $user_group = $this->db->update('users_group', $update_user_group);
            return ($update == true && $user_group == true) ? true : false;
        }

        return ($update == true) ? true : false;
    }

    public function delete($id = null)
    {
        if ($id) {
            $this->db->where('id', $id);
            $delete = $this->db->delete('users');
            return ($delete == true) ? true : false;
        }
    }

    // public function countTotalUsers()
    // {
    //     $sql = "SELECT * FROM users WHERE id != ?";
    //     $query = $this->db->query($sql, array(1));
    //     return $query->num_rows();
    // }
}
