<div class="container">
    <div class="jumbotron">
        <div id="container">
<h1><center>Student Registration</center></h1>
<div class="container">

    <!-- Include Flash Data File -->
    <?php $this->load->view('_FlashAlert\flash_alert.php') ?>
    
    <?= form_open() ?>
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="full_name" value="<?= set_value('full_name'); ?>" class="form-control <?= (form_error('full_name') == "" ? '':'is-invalid') ?>" placeholder="Enter Full Name">
            <?= form_error('full_name'); ?>        
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" value="<?= set_value('username'); ?>" class="form-control <?= (form_error('username') == "" ? '':'is-invalid') ?>" placeholder="Enter Userame">  
            <?= form_error('username'); ?>           
        </div>
        <div class="form-group">
            <label>Email address</label>
            <input type="email" name="email" value="<?= set_value('email'); ?>" class="form-control <?= (form_error('email') == "" ? '':'is-invalid') ?>" placeholder="Enter Email"> 
            <?= form_error('email'); ?>            
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" value="<?= set_value('password'); ?>" class="form-control <?= (form_error('password') == "" ? '':'is-invalid') ?>" placeholder="Password">
            <?= form_error('password'); ?> 
        </div>
        <div class="form-group">
            <label>Password Confirmation</label>
            <input type="password" name="passconf" value="<?= set_value('passconf'); ?>" class="form-control <?= (form_error('passconf') == "" ? '':'is-invalid') ?>" placeholder="Password Confirmation">
            <?= form_error('passconf'); ?> 
        </div>
        <div class="form-group">
            <label>valid</label>
            <input type="text" name="valid" value="<?= set_value('valid'); ?>" class="form-control <?= (form_error('valid') == "" ? '':'is-invalid') ?>" placeholder="valid yes or no">
            <?= form_error('passconf'); ?> 
        </div>
        <div class="form-group">
            <label>Gender</label><br>
            <select name="gender">
            <option class="form-control" value="Male">Male</option>
            <option class="form-control" value="Female">Female</option>
            <option class="form-control" value="Other">Other</option>
          </select>
        </div>
        <div class="form-group">
            <label>Date</label>
            <input type="date" name="cdate" value="<?= set_value('date'); ?>" class="form-control <?= (form_error('date') == "" ? '':'is-invalid') ?>">  
            <?= form_error('cdate'); ?>           
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    <?= form_close() ?>
</div>
</div>
</div>
</div>
<br>