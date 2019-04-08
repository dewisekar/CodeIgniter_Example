<?php $this->load->view("partials/header.php") ?>
<title>Dashboard - Manajemen Pegawai</title>
<!-- END Header -->      
<nav id="sidebar">
    <!-- Sidebar Scroll Container -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="content-header content-header-fullrow px-15">
                <!-- Mini Mode -->
                <div class="content-header-section sidebar-mini-visible-b">
                    <!-- Logo -->
                    <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                        <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                    </span>
                    <!-- END Logo -->
                </div>
                <!-- END Mini Mode -->

                <!-- Normal Mode -->
                <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                    <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                        <i class="fa fa-times text-danger"></i>
                    </button>
                    <!-- END Close Sidebar -->

                    <!-- Logo -->
                    <div class="content-header-item">
                        <a class="link-effect font-w700" href="index.html">
                            <i class="si si-fire text-primary"></i>
                            <span class="font-size-xl text-dual-primary-dark">code</span><span class="font-size-xl text-primary">base</span>
                        </a>
                    </div>
                    <!-- END Logo -->
                </div>
                <!-- END Normal Mode -->
            </div>
            <!-- END Side Header -->

            <!-- Side User -->
            <div class="content-side content-side-full content-side-user px-10 align-parent">
                <!-- Visible only in mini mode -->
                <div class="sidebar-mini-visible-b align-v animated fadeIn">
                    <img class="img-avatar img-avatar32" src="assets/img/avatars/avatar15.jpg" alt="">
                </div>
                <!-- END Visible only in mini mode -->

                <!-- Visible only in normal mode -->
                <div class="sidebar-mini-hidden-b text-center">
                    <a class="img-link" href="be_pages_generic_profile.html">
                        <img class="img-avatar" src="assets/img/avatars/avatar15.jpg" alt="">
                    </a>
                    <ul class="list-inline mt-10">
                        <li class="list-inline-item">
                            <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="be_pages_generic_profile.html"><?php echo $this->session->userdata('nama'); ?></a>
                        </li>
                        <li class="list-inline-item">
                            <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                            <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                                <i class="si si-drop"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="link-effect text-dual-primary-dark" href="<?php echo base_url() ?>admin/dashboard/logout">
                                <i class="si si-logout"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END Visible only in normal mode -->
            </div>
            <!-- END Side User -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li class="">
                        <a href="<?php echo base_url() ?>dashboard" class=""><i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                    </li>
                    <li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">Manajemen Pegawai</span></li>
                    <li class="">
                        <a href="<?php echo base_url() ?>pegawai" class=""><i class="fa fa-users"></i><span class="sidebar-mini-hide">Daftar Pegawai</span></a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url() ?>add-pegawai" class=""><i class="fa fa-plus"></i><span class="sidebar-mini-hide">Tambah Pegawai</span></a>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-energy"></i><span class="sidebar-mini-hide">Daftar Unit</span></a>
                        <ul>
                            <?php foreach($list_tree as $bye){ echo $bye;}  ?>
                        </ul>
                    </li>
                    <li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">Manajemen Unit</span></li>
                    <li class="">
                        <a href="<?php echo base_url() ?>unit" class="active"><i class="si si-list"></i><span class="sidebar-mini-hide">Kelola Unit</span></a>
                    </li>
                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- Sidebar Content -->
    </div>
    <!-- END Sidebar Scroll Container -->
</nav>

<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
         <!-- Table -->
         <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Daftar unit</h3>
                <div class="block-options">
                    <button type="button" name="submit" value="submit" class="btn btn-alt-primary" data-toggle="collapse" data-target="#form">Tambah Unit</button>
                </div>
            </div>
            <div class="block-content">
                <?php if($this->session->flashdata('success')){ ?>  
                    <div class="alert alert-success text-center">  
                        <?php echo $this->session->flashdata('success'); ?>  
                    </div>  
                <?php } ?> 
                <div class="row justify-content-center py-20 collapse col-xl-12" id="form">
                    <div class="col-xl-12">
                        <!-- jQuery Validation (.js-validation-bootstrap class is initialized in js/pages/be_forms_validation.js) -->
                        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                        <form class="js-validation-bootstrap" action="<?php base_url() ?>admin/unit/addUnit" method="post">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Nama unit<span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="val-username" name="nama-unit" placeholder="Masukkan nama unit..." required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Apakah unit ini bagian dari unit lain?<span class="text-danger">*</span></label>
                                <div class="col-8">
                                    <div class="custom-control custom-radio custom-control-inline mb-5">
                                        <input class="custom-control-input" type="radio" name="bagian" id="example-inline-radio1" value="0" checked>
                                        <label class="custom-control-label" for="example-inline-radio1">Tidak</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline mb-5">
                                        <input class="custom-control-input" type="radio" name="bagian" id="example-inline-radio2" value="1">
                                        <label class="custom-control-label" for="example-inline-radio2">Ya</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-select2">Bagian dari <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <select class="js-select2 form-control" id="bagiandari" name="bagiandari" style="width: 100%;" data-placeholder="Choose one.." disabled>
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        <?php print_r($list_drop) ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" name="submit" value="submit" class="btn btn-alt-primary">Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-vcenter">
                    <thead>
                        <tr>                            
                            <th>Nama Unit</th>
                            <th>Actions</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($list_tab as$menu){ echo $menu;?> 
                        <?php } ?>
                       
                    </tbody>                    
                </table>
            </div>            
        </div>
        <!-- END Table -->
    </div>
    <!-- END Page Content -->   
    </div>
</main>



<?php $this->load->view("partials/footer.php") ?>
