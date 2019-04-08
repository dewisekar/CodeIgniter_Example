<!doctype html>
<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        

        <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="Codebase">
        <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->

        <!-- END Icons -->
        <link rel="stylesheet" href="../assets/js/plugins/datatables/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../assets/js/plugins/select2/select2.min.css">
        <link rel="stylesheet" href="../assets/js/plugins/select2/select2-bootstrap.min.css">
        
        <!-- Stylesheets -->
        <!-- Codebase framework -->
        <link rel="stylesheet" id="css-main" href="../assets/css/codebase.min.css">

        

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>
        <div id="page-container" class="sidebar-o sidebar-inverse side-scroll page-header-fixed main-content-narrow">     
            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div class="content-header-section">
                        <!-- Toggle Sidebar -->
                        <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                        <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-navicon"></i>
                        </button>
                        <!-- END Toggle Sidebar -->

                        <!-- Open Search Section -->
                       

                        

                        <!-- Color Themes (used just for demonstration) -->
                        <!-- Themes functionality initialized in Codebase() -> uiHandleTheme() -->
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-circle btn-dual-secondary" id="page-header-themes-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-paint-brush"></i>
                            </button>
                            <div class="dropdown-menu min-width-150" aria-labelledby="page-header-themes-dropdown">
                                <h6 class="dropdown-header text-center">Color Themes</h6>
                                <div class="row no-gutters text-center mb-5">
                                    <div class="col-4 mb-5">
                                        <a class="text-default" data-toggle="theme" data-theme="default" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-4 mb-5">
                                        <a class="text-elegance" data-toggle="theme" data-theme="assets/css/themes/elegance.min.css" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-4 mb-5">
                                        <a class="text-pulse" data-toggle="theme" data-theme="assets/css/themes/pulse.min.css" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-4 mb-5">
                                        <a class="text-flat" data-toggle="theme" data-theme="assets/css/themes/flat.min.css" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-4 mb-5">
                                        <a class="text-corporate" data-toggle="theme" data-theme="assets/css/themes/corporate.min.css" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-4 mb-5">
                                        <a class="text-earth" data-toggle="theme" data-theme="assets/css/themes/earth.min.css" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="sidebar_style_inverse_toggle">Sidebar Style</button>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="be_ui_color_themes.html">
                                    <i class="fa fa-paint-brush"></i> All Color Themes
                                </a>
                            </div>
                        </div>
                        <!-- END Color Themes -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div class="content-header-section">
                        <!-- User Dropdown -->
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $this->session->userdata('nama'); ?><i class="fa fa-angle-down ml-5"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right min-width-150" aria-labelledby="page-header-user-dropdown">
                                
                                <!-- END Side Overlay -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url() ?>admin/dashboard/logout">
                                    <i class="si si-logout mr-5"></i> Sign Out
                                </a>
                            </div>
                        </div>
                        <!-- END User Dropdown -->

                        <!-- Toggle Side Overlay -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

                

                <!-- Header Loader -->
                <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-primary">
                    <div class="content-header content-header-fullrow text-center">
                        <div class="content-header-item">
                            <i class="fa fa-sun-o fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
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
                                <img class="img-avatar img-avatar32" src="../assets/img/avatars/avatar15.jpg" alt="">
                            </div>
                            <!-- END Visible only in mini mode -->

                            <!-- Visible only in normal mode -->
                            <div class="sidebar-mini-hidden-b text-center">
                                <a class="img-link" href="be_pages_generic_profile.html">
                                    <img class="img-avatar" src="../assets/img/avatars/avatar15.jpg" alt="">
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
                                <li class="active">
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
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-list"></i><span class="sidebar-mini-hide">Daftar Unit</span></a>
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
                    <!-- Bootstrap Design -->
                        <?php if($this->session->flashdata('success')){ ?>  
                            <div class="alert alert-success text-center">  
                                <?php echo $this->session->flashdata('success'); ?>  
                            </div>  
                        <?php } ?> 
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Default Elements -->
                                <div class="block">
                                    <div class="block-header block-header-default">
                                        <h3 class="block-title">Detail Pegawai</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn btn-alt-warning" id="buttonedit1" onclick="editPeg()">
                                            <i class="fa fa-edit"></i>
                                            Edit Pegawai</button>
                                            <button type="button" class="btn btn-alt-danger" id="buttonedit2" onclick="cancelEditPeg()" style="display: none">
                                            <i class="fa fa-times"></i>
                                            Cancel</button>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <form action="<?php echo base_url() ?>admin/detailpegawai/editPegawai/<?php echo $detpeg[0]->id_pegawai; ?>" method="post" >
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">NIP<span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP..." value="<?php echo $detpeg[0]->nip_pegawai; ?>" value="<?php echo $detpeg[0]->nip_pegawai; ?>"required disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">Nama<span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama..." value="<?php echo $detpeg[0]->nama_pegawai; ?>" required disabled >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">Alamat<span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat..." value="<?php echo $detpeg[0]->alamat_pegawai; ?>" required disabled >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">Tempat lahir<span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" placeholder="Masukkan tempat lahir..." value="<?php echo $detpeg[0]->tempatlahir_pegawai; ?>" required disabled >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">Tanggal lahir<span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" placeholder="Masukkan tempat lahir..." value="<?php echo $detpeg[0]->tanggallahir_pegawai; ?>" required disabled >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4">Jenis Kelamin</label>
                                                <?php if($detpeg[0]->jk_pegawai == 'L'){ ?>
                                                <div class="col-4">
                                                    <div class="custom-control custom-radio mb-5">
                                                        <input class="custom-control-input" type="radio" name="jk" id="example-radio1" value="L" checked>
                                                        <label class="custom-control-label" for="example-radio1">Laki-laki</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mb-5">
                                                        <input class="custom-control-input" type="radio" name="jk" id="example-radio2" value="P">
                                                        <label class="custom-control-label" for="example-radio2">Perempuan</label>
                                                    </div>
                                                </div>
                                                <?php } else{ ?>
                                                <div class="col-4">
                                                    <div class="custom-control custom-radio mb-5">
                                                        <input class="custom-control-input" type="radio" name="jk" id="example-radio1" value="L" >
                                                        <label class="custom-control-label" for="example-radio1">Laki-laki</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mb-5">
                                                        <input class="custom-control-input" type="radio" name="jk" id="example-radio2" value="P" checked>
                                                        <label class="custom-control-label" for="example-radio2">Perempuan</label>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-select2">Golongan <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <select class="js-select2 form-control" id="golongan" name="golongan" style="width: 100%;" data-placeholder="Choose one.." required disabled >
                                                        <option value="<?php echo $detpeg[0]->golongan_pegawai; ?>"><?php echo $detpeg[0]->golongan_pegawai; ?></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
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
                                                    <input type="text" class="form-control" id="eselon" name="eselon" placeholder="Masukkan eselon..." value="<?php echo $detpeg[0]->eselon_pegawai; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">Jabatan</label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan jabatan..." value="<?php echo $detpeg[0]->jabatan_pegawai; ?>" disabled >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-select2">Tipe Pegawai <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <select class="js-select2 form-control" id="tipe" name="tipe" style="width: 100%;" data-placeholder="Choose one.."  required disabled>
                                                        <option value="<?php echo $detpeg[0]->tipe_pegawai; ?>"><?php echo $detpeg[0]->tipe_pegawai; ?></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                        <option value="Tetap">Tetap</option>
                                                        <option value="Honorer">Honorer</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">Tempat tugas<span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="tempattugas" name="tempattugas" placeholder="Masukkan tempat tugas..." value="<?php echo $detpeg[0]->tempattugas_pegawai; ?>" required disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">Agama<span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="agama" name="agama" placeholder="Masukkan agama..." value="<?php echo $detpeg[0]->agama_pegawai; ?>" required disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">Unit kerja<span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <select class="js-select2 form-control" id="unitkerja" name="unitkerja" style="width: 100%;" data-placeholder="Choose one.." value="<?php echo $detpeg[0]->nama_unit; ?>" required disabled>
                                                        <option value="<?php echo $detpeg[0]->id_unit; ?>"><?php echo $detpeg[0]->nama_unit; ?></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                        <?php print_r($unit) ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">No. HP<span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Masukkan No. HP..." value="<?php echo $detpeg[0]->nohp_pegawai; ?>" required disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">NPWP</label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="npwp" name="npwp" placeholder="Masukkan NPWP..." value="<?php echo $detpeg[0]->npwp_pegawai; ?>" disabled >
                                                </div>
                                            </div>                                            
                                            <div class="form-group row">
                                                <div class="col-lg-8 ml-auto">
                                                    <button type="submit" class="btn btn-alt-primary" value="submit" name="submit" id="submit" style="display:none">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- END Default Elements -->
                            </div>
                            <div class="col-md-6">
                                <!-- Normal Form -->
                                <div class="block">
                                    <div class="block-header block-header-default">
                                        <h3 class="block-title">Foto Pegawai</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn btn-alt-warning" value="submit" name="submit" id="btn3" onclick="uploadPh()">
                                            <i class="fa fa-upload"></i>
                                            Upload Photo</button>
                                            <button type="submit" style ="display: none" class="btn btn-alt-danger" value="submit" name="submit" id="btn4" onclick="cancelUploadPh()">
                                            <i class="fa fa-times"></i>
                                            Cancel</button>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <?php echo form_open_multipart('admin/detailpegawai/uploadPhoto2/'.$detpeg[0]->id_pegawai); ?>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">Foto</label>
                                                <div class="col-12 text-center mb-10">
                                                    <?php if($detpeg[0]->foto_pegawai != NULL ){ ?>
                                                        <img src="../<?php base_url() ?>fotouploads/<?php echo $detpeg[0]->foto_pegawai; ?>"  width="100" height="100">
                                                    <?php } else {?>
                                                        <p> Belum ada foto </p>
                                                    <?php } ?> 
                                                </div>
                                                <div class="col-12" id="formup" style="display: none">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="example-file-input-custom" name="foto">
                                                        <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="formup2" style="display: none">
                                                <button type="submit" class="btn btn-alt-primary" name="submit" value="submit">Upload</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- END Normal Form -->
                            </div>
                        </div>
                        <!-- END Bootstrap Design -->
                </div>
                <!-- END Page Content -->
            </main>
            <footer id="page-footer" class="opacity-0">
                <div class="content py-20 font-size-xs clearfix">
                    <div class="float-right">
                        Crafted with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="http://goo.gl/vNS3I" target="_blank">pixelcave</a>
                    </div>
                    <div class="float-left">
                        <a class="font-w600" href="https://goo.gl/po9Usv" target="_blank">Codebase 2.0</a> &copy; <span class="js-year-copy">2017</span>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <!-- Codebase Core JS -->
        <script src="../assets/js/core/jquery.min.js"></script>
        <script src="../assets/js/core/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="../assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="../assets/js/core/jquery.appear.min.js"></script>
        <script src="../assets/js/core/jquery.countTo.min.js"></script>
        <script src="../assets/js/core/js.cookie.min.js"></script>
        <script src="../assets/js/codebase.js"></script>

        <!-- Page JS Plugins -->
        <script src="../assets/js/plugins/select2/select2.full.min.js"></script>
        <script src="../assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="../assets/js/plugins/jquery-validation/additional-methods.min.js"></script>

        <script>
            jQuery(function () {
                // Init page helpers (Select2 plugin)
                Codebase.helpers('select2');
            });
        </script>
        <script>
            jQuery(function () {
                // Init page helpers (Table Tools helper)
                Codebase.helpers('table-tools');
            });
        </script>
        <script src="../assets/js/pages/be_forms_validation.js"></script>
        <script>
            function editPeg()
            {
                document.getElementById("buttonedit1").style.display = "none";
                document.getElementById("buttonedit2").style.display = "block";
                document.getElementById("submit").style.display = "block";
                document.getElementById("nip").disabled = false;
                document.getElementById("nama").disabled = false;
                document.getElementById("alamat").disabled = false;
                document.getElementById("tempatlahir").disabled = false;
                document.getElementById("tanggallahir").disabled = false;
                document.getElementById("golongan").disabled = false;
                document.getElementById("eselon").disabled = false;
                document.getElementById("jabatan").disabled = false;
                document.getElementById("tipe").disabled = false;
                document.getElementById("tempattugas").disabled = false;
                document.getElementById("agama").disabled = false;
                document.getElementById("unitkerja").disabled = false;
                document.getElementById("nohp").disabled = false;
                document.getElementById("npwp").disabled = false;
            }
            function cancelEditPeg()
            {
                document.getElementById("buttonedit1").style.display = "block";
                document.getElementById("buttonedit2").style.display = "none";
                document.getElementById("submit").style.display = "none";
                document.getElementById("nip").disabled = true;
                document.getElementById("nama").disabled = true;
                document.getElementById("alamat").disabled = true;
                document.getElementById("tempatlahir").disabled = true;
                document.getElementById("tanggallahir").disabled = true;
                document.getElementById("golongan").disabled = true;
                document.getElementById("eselon").disabled = true;
                document.getElementById("jabatan").disabled = true;
                document.getElementById("tipe").disabled = true;
                document.getElementById("tempattugas").disabled = true;
                document.getElementById("agama").disabled = true;
                document.getElementById("unitkerja").disabled = true;
                document.getElementById("nohp").disabled = true;
                document.getElementById("npwp").disabled = true;
            }

            function uploadPh()
            {
                document.getElementById("btn3").style.display = "none";
                document.getElementById("btn4").style.display = "block";
                document.getElementById("formup").style.display = "block";
                document.getElementById("formup2").style.display = "block";

            }
            function cancelUploadPh()
            {
                document.getElementById("btn3").style.display = "block";
                document.getElementById("btn4").style.display = "none";
                document.getElementById("formup").style.display = "none";
                document.getElementById("formup2").style.display = "none";
                
            }
        </script>
    </body>
</html>


