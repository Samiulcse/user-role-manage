<?php

class Users extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->not_logged_in();

        $this->data['page_title'] = 'Users';

        $this->load->model('model_users');
        $this->load->model('model_groups');
        $this->load->model('model_stores');
    }

    public function index()
    {
        if (!in_array('viewUser', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $this->render_template('users/index', $this->data);
    }

    public function fetchAllUserData()
    {
        if (!in_array('viewUser', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $result = array('data' => array());

        $user_data = $this->model_users->getUserData();

        foreach ($user_data as $key => $value) {
            // button
            $buttons = '';

            if (in_array('updateUser', $this->permission)) {
                $buttons = '<button type="button" class="btn btn-default" onclick="editFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>';
            }

            if (in_array('deleteUser', $this->permission)) {
                $buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
            }

            $group = $this->model_users->getUserGroup($value['id']);

            $result['data'][$key] = array(
                $value['username'],
                $value['email'],
                $value['firstname'] . ' ' . $value['lastname'],
                $value['phone'],
                $group['group_name'],
                $buttons,
            );
        } // /foreach

        echo json_encode($result);
    }

    public function fetchGroupStoreData()
    {
        if (!in_array('createUser', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $result = [];

        $result['groups'] = $this->model_groups->getGroupData();
        $result['stores'] = $this->model_stores->getActiveStores();

        echo json_encode($result);

    }

    // create
    public function create()
    {
        if (!in_array('createUser', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $response = array();

        $this->form_validation->set_rules('groups', 'Group', 'required');
        $this->form_validation->set_rules('store', 'Store', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');
        $this->form_validation->set_rules('fname', 'First name', 'trim|required');

        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if ($this->form_validation->run() == true) {
            // true case
            $password = $this->password_hash($this->input->post('password'));
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $password,
                'email' => $this->input->post('email'),
                'firstname' => $this->input->post('fname'),
                'lastname' => $this->input->post('lname'),
                'phone' => $this->input->post('phone'),
                'gender' => $this->input->post('gender'),
                'store_id' => $this->input->post('store'),
            );

            $create = $this->model_users->create($data, $this->input->post('groups'));

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

    public function fetchUsersDataById($id = null)
    {
        if ($id) {

            $data['store_data'] = $this->model_stores->getActiveStores();

            $data['user_data'] = $this->model_users->getUserData($id);

            $data['user_group'] = [$this->model_users->getUserGroup($id)];

            $data['group_data'] = $this->model_groups->getGroupData();

            echo json_encode($data);
        }

    }

    // update
    public function update($id)
    {
        if (!in_array('updateStore', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $response = array();

        if ($id) {
            $this->form_validation->set_rules('groups', 'Group', 'required');
            $this->form_validation->set_rules('store', 'Store', 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('fname', 'First name', 'trim|required');

            $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

            if ($this->form_validation->run() == true) {

                if (empty($this->input->post('password')) && empty($this->input->post('cpassword'))) {
                    $data = array(
                        'username' => $this->input->post('username'),
                        'email' => $this->input->post('email'),
                        'firstname' => $this->input->post('fname'),
                        'lastname' => $this->input->post('lname'),
                        'phone' => $this->input->post('phone'),
                        'gender' => $this->input->post('gender'),
                        'store_id' => $this->input->post('store'),
                    );

                    $update = $this->model_users->edit($data, $id, $this->input->post('groups'));
                    if ($update == true) {
                        $response['success'] = true;
                        $response['messages'] = 'Succesfully updated';
                    } else {
                        $response['success'] = false;
                        $response['messages'] = 'Error in the database while updated the brand information';
                    }
                } else {
                    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
                    $this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

                    if ($this->form_validation->run() == true) {

                        $password = $this->password_hash($this->input->post('password'));

                        $data = array(
                            'username' => $this->input->post('username'),
                            'password' => $password,
                            'email' => $this->input->post('email'),
                            'firstname' => $this->input->post('fname'),
                            'lastname' => $this->input->post('lname'),
                            'phone' => $this->input->post('phone'),
                            'gender' => $this->input->post('gender'),
                            'store_id' => $this->input->post('store'),
                        );

                        $update = $this->model_users->edit($data, $id, $this->input->post('groups'));
                        if ($update == true) {
                            $response['success'] = true;
                            $response['messages'] = 'Succesfully updated';

                        } else {
                            $response['success'] = false;
                            $response['messages'] = 'Error in the database while updated the brand information';
                        }
                    } else {
                        $response['success'] = false;
                        foreach ($_POST as $key => $value) {
                            $response['messages'][$key] = form_error($key);
                        }
                    }

                }
            } else {
                $response['success'] = false;
                foreach ($_POST as $key => $value) {
                    $response['messages'][$key] = form_error($key);
                }
            }
        } else {
            $response['success'] = false;
            $response['messages'] = 'Error please refresh the page again!!';
        }

        echo json_encode($response);
    }

    // create hash password
    public function password_hash($pass = '')
    {
        if ($pass) {
            $password = password_hash($pass, PASSWORD_DEFAULT);
            return $password;
        }
    }

    // remove
    public function remove()
    {
        if (!in_array('deleteUser', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $user_id = $this->input->post('user_id');

        $response = array();
        if ($user_id) {
            $delete = $this->model_users->remove($user_id);
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
