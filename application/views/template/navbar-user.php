
<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent ">
        <div class="main-header header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2 col-md-1">
                        <div class="logo">
                            <a href="index.html"><img src="<?= base_url() ?>assets/landing/img/logo/logoo.png" width="150px" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-8 col-md-8">
                        <!-- Main-menu -->
                        <div class="main-menu f-right d-none d-lg-block">
                            <nav> 
                                <ul id="navigation">    
                                    <li>
                                        <a> <img src="<?= base_url('assets/user/img/'.$this->session->userdata('photo')) ?>" width="30px" alt="" class="img-thumbnail mr-2"><?= $this->session->userdata('nama') ?></a>
                                        <ul class="submenu">
                                            <li><a href="<?= base_url('authent/logout') ?>">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
