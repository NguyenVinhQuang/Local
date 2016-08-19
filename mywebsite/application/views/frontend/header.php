<div id="header">
    <div id="header_inside" class="clearfix">
        <div id="logo">
            <a href="<?php echo base_url(); ?>index.php/home">yelp</a>
        </div>
        <form action="<?php echo base_url(); ?>index.php/result" method="post">
            <div id="search_field">
                <label for="txtSearch">Find</label>
                <div id="input_field">
                    <input type="text" id="txtSearch" name="txtKeyword" placeholder="tacos, cheap dinner">
                </div>
            </div> <!-- end search field -->
            <button type="submit" >
                <i></i>
            </button>
        </form>
        <ul id="sign_up">
            <?php if ($this->session->userdata('logged_in')): ?>
                <li><a href="<?php echo base_url(); ?>index.php/logout">Log Out</a></li>    
            <?php else: ?>
                <li><a href="<?php echo base_url(); ?>index.php/signup">Sign Up</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/login">Log In</a></li>
            <?php endif ?>
            
        </ul>
        <ul id="nav_header">
            <li><a href="<?php echo base_url(); ?>index.php/home">Home</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/place">Create New Place</a></li>
            <?php if ($this->session->userdata('user_id') ): ?>
            <?php 
                $user_header = $this->m_user->select_user($this->session->userdata('user_id'));
             ?>
                <li><a href="<?php echo base_url(); ?>index.php/user"><?php echo ucfirst($user_header['account']); ?>'s Profile</a></li>
            <?php endif ?>
        </ul>

        
    </div> <!-- end header inside -->
</div> <!-- end header -->