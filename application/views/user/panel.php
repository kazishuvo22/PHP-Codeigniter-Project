<div class="container">

    <!-- Include Flash Data File -->
    <?php $this->load->view('_FlashAlert\flash_alert.php') ?>
    <div class="jumbotron">
    	<h3>Control Panel</h3>
    </div>
    
    <div class="jumbotron">
        <h3 class="display-4">Welcome to <?= $this->session->userdata('USER_NAME') ?></h3>
        <hr class="my-4">
        <h5 class="display-6">Email :  <?= $this->session->userdata('USER_EMAIL') ?></h5>
        <h5 class="display-6">Active: <?= $this->session->userdata('IS_ACTIVE') ?></h5>
        <h5 class="display-6">Designation: <?= $this->session->userdata('Designation') ?></h5>
        <h5 class="display-6">ID: <?= $this->session->userdata('USER_ID') ?></h5>
        <h5 class="display-6">Browser: <?= $this->session->userdata('browser') ?></h5>
        <h5 class="display-6">Operating System: <?= $this->session->userdata('os') ?></h5>
    </div>
</div>

        
</div>
