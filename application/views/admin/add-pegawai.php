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
                        <a class="link-effect font-w700" href="#">
                            <i class="si si-fire text-primary"></i>
                            Sistem Informasi Pegawai
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
                        <a href="<?php echo base_url() ?>add-pegawai" class="active"><i class="fa fa-plus"></i><span class="sidebar-mini-hide">Tambah Pegawai</span></a>
                    </li>
                    <li class="">
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#" class=""><i class="si si-list"></i><span class="sidebar-mini-hide">Daftar Unit</span></a>
                        <ul>
                            <?php foreach($list_tree as $bye){ echo $bye;}  ?>
                        </ul>
                    </li>
                    <li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">Manajemen Unit</span></li>
                    <li class="">
                        <a href="<?php echo base_url() ?>unit" class=""><i class="fa fa-list"></i><span class="sidebar-mini-hide">Kelola Unit</span></a>
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
        <!-- Bootstrap Forms Validation -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Tambah pegawai</h3>
                <div class="block-options">
                    
                </div>
            </div>
            <div class="block-content">
                <div class="row justify-content-center py-20">
                    <div class="col-xl-6">
                        <!-- jQuery Validation (.js-validation-bootstrap class is initialized in js/pages/be_forms_validation.js) -->
                        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                        <?php if($this->session->flashdata('success')){ ?>  
                            <div class="alert alert-success text-center">  
                                <?php echo $this->session->flashdata('success'); ?>  
                            </div>  
                        <?php } ?> 
                        <?php echo form_open_multipart('admin/pegawai/addPegawai'); ?>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">NIP<span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="val-nama" name="nip" placeholder="Masukkan NIP..." required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Nama<span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="val-username" name="nama" placeholder="Masukkan nama..." required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Alamat<span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="val-username" name="alamat" placeholder="Masukkan alamat..." required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Tempat lahir<span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="val-username" name="tempatlahir" placeholder="Masukkan tempat lahir..." required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Tanggal lahir<span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="date" class="form-control" id="val-username" name="tanggallahir" placeholder="Masukkan tempat lahir..." required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Jenis kelamin<span class="text-danger">*</span></label>
                                <div class="col-8">
                                    <div class="custom-control custom-radio custom-control-inline mb-5">
                                        <input class="custom-control-input" type="radio" name="jk" id="example-inline-radio1" value="L" checked>
                                        <label class="custom-control-label" for="example-inline-radio1">Laki-laki</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline mb-5">
                                        <input class="custom-control-input" type="radio" name="jk" id="example-inline-radio2" value="P">
                                        <label class="custom-control-label" for="example-inline-radio2">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-select2">Golongan <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <select class="js-select2 form-control" id="val-select2" name="golongan" style="width: 100%;" data-placeholder="Choose one.." required>
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        <option value="I/a">I/a</option>
                                        <option value="I/b">I/b</option>
                                        <option value="I/c">I/c</option>
                                        <option value="I/d">I/d</option>
                                        <option value="II/a">II/a</option>
                                        <option value="II/b">II/b</option>
                                        <option value="II/c">II/c</option>
                                        <option value="II/d">II/d</option>
                                        <option value="III/a">III/a</option>
                                        <option value="III/b">III/b</option>
                                        <option value="III/c">III/c</option>
                                        <option value="III/d">III/d</option>
                                        <option value="IV/a">IV/a</option>
                                        <option value="IV/b">IV/b</option>
                                        <option value="IV/c">IV/c</option>
                                        <option value="IV/d">IV/d</option>
                                        <option value="IV/e">IV/e</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Eselon</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="val-username" name="eselon" placeholder="Masukkan eselon...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Jabatan</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="val-username" name="jabatan" placeholder="Masukkan jabatan..." >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-select2">Tipe Pegawai <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <select class="js-select2 form-control" id="val-select2" name="tipe" style="width: 100%;" data-placeholder="Choose one.." required>
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        <option value="Tetap">Tetap</option>
                                        <option value="Honorer">Honorer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Tempat tugas<span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="val-username" name="tempattugas" placeholder="Masukkan tempat tugas..." required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Agama<span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="val-username" name="agama" placeholder="Masukkan agama..." required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Unit kerja<span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <select class="js-select2 form-control" id="val-select2" name="unitkerja" style="width: 100%;" data-placeholder="Choose one.." required>
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        <?php print_r($unit) ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">No. HP<span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="val-username" name="nohp" placeholder="Masukkan No. HP..." required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">NPWP</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="val-username" name="npwp" placeholder="Masukkan NPWP..." >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Foto</label>
                                <div class="col-8">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="example-file-input-custom" name="foto">
                                        <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-alt-primary" value="submit" name="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END Page Content -->
</main>



<?php $this->load->view("partials/footer.php") ?>
