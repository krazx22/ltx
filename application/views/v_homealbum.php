<body id="top">
    <div class="page">
        <header>
            <div class="pp-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/favicon.png" alt="Logo"></a><a class="navbar-brand" href="<?php echo base_url(); ?>">Photo Perfect</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active"><a class="nav-link" href="<?php echo base_url(); ?>Home">Home</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>About">About</a>
                                </li>
                                <?php if ($this->session->userdata('logged_in')) : ?>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Master
                                        </a>
                                        <!-- Dropdown Menu -->
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="<?php echo base_url(); ?>Album">Album</a>
                                            <a class="dropdown-item" href="<?php echo base_url(); ?>Foto">Photos</a>
                                            <a class="dropdown-item" href="<?php echo base_url(); ?>About">About</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Hi,
                                            <?php echo $this->session->userdata('username'); ?>!
                                        </a>
                                        <!--Dropdown Menu-->
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="<?php echo base_url(); ?>Login/logout">Logout</a>
                                        </div>
                                    </li>
                                <?php else : ?>
                                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>Login">Login</a>
                                    <?php endif; ?>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <div class="page-content">
            <div class="container">
                <div class="container pp-section">
                    <div class="row">
                        <div class="col-md-9 col-sm-12 px-0">
                            <h1 class="h3"> We are Photo Perfect, A Digital Photography Studio.</h1>
                        </div>
                    </div>
                </div>
                <div class="container px-0 py-4">
                    <div class="pp-category-filter">
                        <div class="row">
                            <div class="col-sm-12">
                                <?php //foreach ($albumsi as $albumdata):  
                                ?>
                                <!-- <a class="btn btn-primary" href="<?php //echo base_url('album/view_photos' . $albumdata['AlbumID']);  
                                                                        ?>">
                    <?php //echo $albumdata['NamaAlbum'];  
                    ?>
                  </a>-->
                  <a class="btn btn-primary" href="<?php echo base_url(); ?>Home">Kembali</a>
                                <?php //endforeach;  
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container px-0">
                    <div class="pp-gallery">
                        <div class="card-columns">
                            <?php foreach ($photos as $photo) : ?>
                                <div class="card" data-groups="[&quot;nature&quot;"><a href="#">
                                        <figure class="pp-effect"><img class="img-fluid" src="<?php echo base_url('uploads/' . $photo['LokasiFile']); ?>" alt="Foto">
                                            <figcaption>
                                                <div class="h4">Forest</div>
                                                <p>Nature</p>
                                            </figcaption>
                                        </figure>
                                    </a></div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>