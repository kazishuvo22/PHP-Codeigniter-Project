<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $page_title ?></title>
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.min.css"); ?>">
    <script src="<?= base_url("assets/js/jquery-3.3.1.slim.min.js"); ?>"></script>
</head>
<body>
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
                        <?php  
                        /*$this->load->helper('url');
                        $this->db->where("session_id",session_id());
                        $this->db->select('id');
                       $res = $this->db->get('user_session');*/

                        $url = array(
                            'id' => session_id(),
                            'pageurl' => current_url(),
                            'title'=>$page_title,
                        );

                        $this->db->insert('user_activity', $url);
                        ?>
                    </p>
                    <p>
                        


                    </p>

                <?php } else { ?>
                    <!-- User not Login -->
                    <p>
                    <?php 
                    $user_session = array(
                    'session_id'=>session_id(),
                    'ipaddress'=> $_SERVER['REMOTE_ADDR'],
                    'browser'=>$agent = $this->agent->browser().' '.$this->agent->version(),
                    'os'=>$agent = $this->agent->platform());

                    if($user_session['session_id'] && session_id() == false)
                    {

                    $this->db->insert('user_session', $user_session);
                }

                ?>
                    </p>

                    <p>
                        <?php  

                        $url = array(
                            'id' => session_id(),
                            'pageurl' => current_url(),
                            'title'=>$page_title,
                        );

                        $this->db->insert('user_activity', $url);
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