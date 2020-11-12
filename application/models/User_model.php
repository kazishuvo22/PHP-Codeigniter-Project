<?php 

class User_model extends CI_Model {

    protected $User_table_name = "user";
    protected $User_table_name2 = "userdetail";
    protected $User_table_name3 = "user_session";
    protected $User_table_name4 = "user_activity";
    /**
     * Insert User Data in Database
     * @param: {array} userData
     */
    public function insert_user($userData) {
        return $this->db->insert($this->User_table_name, $userData);
    }
    public function insert_user2($userData) {
        return $this->db->insert($this->User_table_name2, $userData);
    }
    public function session_insert($session) {
        return $this->db->insert($this->User_table_name3, $session);
    }


    /**
     * Check User Login in Database
     * @param: {array} userData
     */
    public function check_login($userData) {

        /**
         * First Check Email is Exists in Database
         */
        
        $query = $this->db->get_where($this->User_table_name, array('email' => $userData['email']));
        $query2 = $this->db->get_where($this->User_table_name2, array('email' => $userData['email']));
        if ($this->db->affected_rows() > 0) {

            $password = $query->row('md5_pw');

            /**
             * Check Password Hash 
             */
            if (password_verify($userData['password'], $password) === TRUE) {

                /**
                 * Password and Email Address Valid
                 */
                return [
                    'status' => TRUE,
                    'data' => $query->row(),
                    'data2'=>$query2->row(),
                ];
            } else {
                return ['status' => FALSE,'data' => FALSE];
            }

        } else {
            return ['status' => FALSE,'data' => FALSE];
        }
    }
}
