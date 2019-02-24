<?php

class Groups extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->not_logged_in();

        $this->data['page_title'] = 'Groups';

        $this->load->model('model_groups');
    }

    public function index()
    {
        if (!in_array('viewGroup', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $this->render_template('groups/index', $this->data);

    }

    public function fetchGroupData()
    {
        if (!in_array('viewGroup', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $result = array('data' => array());

        $data = $groups_data = $this->model_groups->getGroupData();

        foreach ($data as $key => $value) {
            // button
            $buttons = '';

            if (in_array('updateGroup', $this->permission)) {
                $buttons = '<button type="button" class="btn btn-default" onclick="editFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>';
            }

            if (in_array('deleteGroup', $this->permission)) {
                $buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
            }

            $result['data'][$key] = array(
                $value['group_name'],
                $buttons,
            );
        } // /foreach

        echo json_encode($result);
    }

    // create
    public function create()
    {
        if (!in_array('createGroup', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $response = array();

        $this->form_validation->set_rules('group_name', 'Group name', 'trim|required');

        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if ($this->form_validation->run() == true) {
            $permission = serialize($this->input->post('permission'));

            $data = array(
                'group_name' => $this->input->post('group_name'),
                'permission' => $permission,
            );

            $create = $this->model_groups->create($data);
            if ($create == true) {
                $response['success'] = true;
                $response['messages'] = 'Succesfully created';
            } else {
                $response['success'] = false;
                $response['messages'] = 'Error in the database while creating the brand information';
            }
        } else {
            $response['success'] = false;
            foreach ($_POST as $key => $value) {
                $response['messages'][$key] = form_error($key);
            }
        }

        echo json_encode($response);
    }

    // fetch group data by id
    public function fetchGroupsDataById($id = null)
    {
        if ($id) {
            $data = $this->model_groups->getGroupData($id);
            $result['group_name'] = $data['group_name'];
            $result['permission'] = unserialize($data['permission']);

            echo json_encode($result);
        }

    }

    // update
    public function update($id = null)
    {
        if (!in_array('updateGroup', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        if ($id) {

            $this->form_validation->set_rules('group_name', 'Group name', 'required');

            if ($this->form_validation->run() == true) {
                // true case
                $permission = serialize($this->input->post('permission'));

                $data = array(
                    'group_name' => $this->input->post('group_name'),
                    'permission' => $permission,
                );

                $update = $this->model_groups->update($data, $id);
                if ($update == true) {
                    $response['success'] = true;
                    $response['messages'] = 'Succesfully Updated';
                } else {
                    $response['success'] = false;
                    $response['messages'] = 'Error in the database while creating the brand information';
                }
            } else {
				// false case
                $response['success'] = false;
                foreach ($_POST as $key => $value) {
                    $response['messages'][$key] = form_error($key);
                }
            }
		}
		echo json_encode($response);

    }

    // delete
    public function remove()
    {
        if (!in_array('deleteGroup', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $group_id = $this->input->post('group_id');

        $response = array();
        if ($group_id) {
            $delete = $this->model_groups->remove($group_id);
            if ($delete == true) {
                $response['success'] = true;
                $response['messages'] = "Successfully removed";
            } else {
                $response['success'] = false;
                $response['messages'] = "Error in the database while removing the brand information";
            }
        } else {
            $response['success'] = false;
            $response['messages'] = "Refersh the page again!!";
        }

        echo json_encode($response);
    }

}
