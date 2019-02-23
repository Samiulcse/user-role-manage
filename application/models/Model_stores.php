<?php

class Model_stores extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // fecth all store data
    public function getStoresData($id = null)
    {
        if ($id) {
            $sql = "SELECT * FROM stores WHERE id = ?";
            $query = $this->db->query($sql, array($id));
            return $query->row_array();
        }

        $sql = "SELECT * FROM stores ORDER BY id DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    // create
    public function create($data = array())
    {
        if ($data) {
            $create = $this->db->insert('stores', $data);
            return ($create == true) ? true : false;
        }
    }
    // update
    public function update($id = null, $data = array())
    {
        if ($id && $data) {
            $this->db->where('id', $id);
            $update = $this->db->update('stores', $data);
            return ($update == true) ? true : false;
        }
    }
    // remove
    public function remove($id = null)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('stores');
			return ($delete == true) ? true : false;
		}

		return false;
	}
    // activeStore
	public function getActiveStore()
	{
		$sql = "SELECT * FROM stores WHERE active = ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}
    // totalStore
	public function countTotalStores()
	{
		$sql = "SELECT * FROM stores WHERE active = ?";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}

}
