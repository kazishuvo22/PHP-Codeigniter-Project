<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $page_title ?></title>
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.min.css"); ?>">
    <script src="<?= base_url("assets/js/jquery-3.3.1.slim.min.js"); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body onload="start_timer()" onbeforeunload="set_active_time()">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">e-Learing Research and Development Lab</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('Users/index') ?>">Home <span class="sr-only">(current)</span></a>
            </li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <?php if (!empty($this->session->userdata('USER_ID')) && $this->session->userdata('USER_ID') > 0) { ?>
                    <!-- User isLogin -->
                    <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
                    </form>&nbsp;
                    <a href="<?= base_url('Users/Panel') ?>" class="btn btn-outline-primary my-2 my-sm-0">User Panel</a> &nbsp;
                    <a href="<?= base_url('Users/logout') ?>" class="btn btn-outline-danger my-2 my-sm-0">Logout</a>
                    <p>
                        <!-- if session is logged in, then data pass to database here(user_session) -->

                        <?php

                            $get_session_id = $this->db->get_where('user_session', array('session_id'=>session_id()));
                            $session_id = $get_session_id->row('session_id');

                            /*Here session data saved to the database //user_session*/

                            if(session_id() != $session_id){
                            $user_session = array(
                            'user_id'=>$this->session->userdata('USER_ID'),
                            'session_id'=>session_id(),
                            'ipaddress'=> $_SERVER['REMOTE_ADDR'],
                            'browser'=>$agent = $this->agent->browser().' '.$this->agent->version(),
                            'os'=>$agent = $this->agent->platform());
                            $this->db->insert('user_session', $user_session);

                            $this->session->set_userdata($user_session);
                        }


                        /* if session is logged in, then data pass to database here(user_activity)*/
                        $get_id = $this->db->get_where('user_session', array('session_id'=>session_id()));
                        $sid = $get_id->row('id');
                        date_default_timezone_set('Asia/Dhaka');

                        $datetime = date('Y-m-d H:i:s');

                        $get = $this->db->get_where('user_activity', array('id'=>$sid,'pageurl'=>current_url(),'title'=>$page_title)); // checking if entity exist.
                        $res = $get->row('numbers_time'); // collecting results.

                        if($get->num_rows()>0){  // checking condition by row count
                            $count = $res + 1;
                            $this->db->where(array('id'=>$sid, 'pageurl'=>current_url(),'title'=>$page_title));
                            $this->db->update('user_activity', array('numbers_time'=>$count)); // Updating the existing entity. 
                        }
                        else {
                            // insert entity using insert query

                            $url = array(
                            'id' => $sid,
                            'pageurl' => current_url(),
                            'title'=>$page_title,
                            'request_datetime'=> $datetime,
                        );

                        $this->db->insert('user_activity', $url);
                        $this->session->set_userdata($url);
                        }

                        ?>
                    </p>
                        <?php  
                        /*$this->load->helper('url');
                        $this->db->where("session_id",session_id());
                        $this->db->select('id');
                       $res = $this->db->get('user_session');*/

                        
                        ?>
                    </p>
                    <p>
                        


                    </p>

                <?php } else { ?>
                    <!-- User not Login -->
                    <p>
                        <!-- if session not logged in, then data pass to database here(user_session) -->
                        <?php

                        date_default_timezone_set('Asia/Dhaka');

                        $datetime = date('Y-m-d H:i:s');

                            $get_session_id = $this->db->get_where('user_session', array('session_id'=>session_id()));
                            $session_id = $get_session_id->row('session_id');

                            /*Here session data saved to the database //user_session*/

                            if(session_id() != $session_id){
                            $user_session = array(
                            'session_id'=>session_id(),
                            'ipaddress'=> $_SERVER['REMOTE_ADDR'],
                            'browser'=>$agent = $this->agent->browser().' '.$this->agent->version(),
                            'os'=>$agent = $this->agent->platform());
                            $this->db->insert('user_session', $user_session);
                            $this->session->set_userdata($user_session);
                        }
                        /* if session is not logged in, then data pass to database here(user_activity)*/
                        $get_id = $this->db->get_where('user_session', array('session_id'=>session_id()));
                        $sid = $get_id->row('id');

                        $get = $this->db->get_where('user_activity', array('id'=>$sid,'pageurl'=>current_url(),'title'=>$page_title)); // checking if entity exist.
                        $res = $get->row('numbers_time'); // collecting results.

                        if($get->num_rows()>0){  // checking condition by row count
                            $count = $res + 1;
                            $this->db->where(array('id'=>$sid, 'pageurl'=>current_url(),'title'=>$page_title));
                            $this->db->update('user_activity', array('numbers_time'=>$count)); // Updating the existing entity. 
                        }
                        else {
                            // insert entity using insert query

                            $url = array(
                            'id' => $sid,
                            'pageurl' => current_url(),
                            'title'=>$page_title,
                            'request_datetime'=> $datetime,
                        );

                        $this->db->insert('user_activity', $url);
                        $this->session->set_userdata($url);
                        }

                        ?>
                    </p>

                    <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form> &nbsp;
                    <a href="<?= base_url('Users/registration') ?>" class="btn btn-outline-primary my-2 my-sm-0">Register</a> &nbsp;
                    <a href="<?= base_url('Users/login') ?>" class="btn btn-outline-warning my-2 my-sm-0">Login</a>
                <?php } ?>
            </div>
        </div>
    </nav>
    <br>