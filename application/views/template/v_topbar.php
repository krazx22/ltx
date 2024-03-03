<body id="top">
    <div class="page">
        <header>
            <div class="pp-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container"><a href="index.html"><img src="<?php echo base_url(); ?>assets/images/favicon.png" alt="Logo"></a><a class="navbar-brand" href="index.html">Photo Perfect</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>Home">Home</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>About">About</a>
                                </li>
                                <?php if ($this->session->userdata('logged_in')) : ?>
                                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Master</a>
                                        <!-- dropdown menu -->
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown"> <a class="dropdown-item" href="<?php echo base_url(); ?>Album">Album</a>
                                            <a class="dropdown-item" href="<?php echo base_url(); ?>Foto">Photos</a> <a class="dropdown-item" href="<?php echo base_url(); ?>About">About</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Hi, <?php echo $this->session->userdata('username'); ?> </a> <!-- dropdown menu -->
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown"> <a class="dropdown-item" href="<?php echo base_url(); ?>Login/logout">Logout</a> </div>
                                    </li> <?php else : ?>
                                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>Login">Login</a>
                                    <?php endif; ?>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>