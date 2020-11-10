<div class="container">

    <!-- Include Flash Data File -->
    <?php $this->load->view('_FlashAlert\flash_alert.php') ?>
    <div class="jumbotron">
    	<h3>Control Panel</h3>
    </div>
    
    <div class="jumbotron">
        <h3 class="display-4">Welcome to <?= $this->session->userdata('USER_NAME') ?></h3>
        <hr class="my-4">
        <h3 class="display-6">Email :  <?= $this->session->userdata('USER_EMAIL') ?></h3>
        <h3 class="display-6">Active: <?= $this->session->userdata('IS_ACTIVE') ?></h3>
        <h3 class="display-6">Designation: <?= $this->session->userdata('Designation') ?></h3>

        
</div>