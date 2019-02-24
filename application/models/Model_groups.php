<?php

class Model_groups extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getGroupData($groupId = null)
    {
        if ($groupId) {
            $sql = "SELECT * FROM groups WHERE id = ?";
            $query = $this->db->query($sql, array($groupId));
            return $query->row_array();
        }

        $sql = "SELECT * FROM groups WHERE id != ? ORDER BY id DESC";
        $query = $this->db->query($sql, array(1));
        return $query->result_array();
    }

    public function getUserGroupByUserId($user_id)
    {
        $sql = "SELECT * FROM user_group
		INNER JOIN groups ON groups.id = user_group.group_id
		WHERE user_group.user_id = ?";
        $query = $this->db->query($sql, array($user_id));
        $result = $query->row_array();

        return $result;

    }
    // create
    public function create($data = array())
    {
        if ($data) {
            $create = $this->db->insert('groups', $data);
            return ($create == true) ? true : false;
        }
    }
    // update
    public function update($data, $id)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('groups', $data);
		return ($update == true) ? true : false;	
	}
    // remove
    public function remove($id = null)
    {
        if ($id) {
            $this->db->where('id', $id);
            $delete = $this->db->delete('groups');
            return ($delete == true) ? true : false;
        }

        return false;
    }

}
