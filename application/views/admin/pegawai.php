<?php $this->load->view("partials/header.php") ?>
<title>Daftar Pegawai</title>
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
                        <a href="<?php echo base_url() ?>pegawai" class="active"><i class="fa fa-users"></i><span class="sidebar-mini-hide">Daftar Pegawai</span></a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url() ?>add-pegawai" class=""><i class="fa fa-plus"></i><span class="sidebar-mini-hide">Tambah Pegawai</span></a>
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
        <!-- Dynamic Table Full Pagination -->
        <div class="block">
            <?php if($this->session->flashdata('success')){ ?>  
                <div class="alert alert-success text-center">  
                    <?php echo $this->session->flashdata('success'); ?>  
                </div>  
            <?php } ?> 
            <div class="block-header block-header-default">
                <h3 class="block-title">Daftar Pegawai</h3>
                <div class="block-options">
                    <button type="button" class="btn btn-alt-Primary" id="buttonedit1" onclick="window.location.href='<?php base_url() ?>admin/pegawai/export'">
                    <i class="fa fa-download"></i>
                    Download Data Pegawai</button>
                </div>
            </div>
            <div class="block-content block-content-full" style="overflow-x: auto;">
                <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality initialized in js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 5%;">No.</th>
                            <th class="text-center">NIP</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center" style="width: 15%;">Pangkat/Gol.</th>
                            <th class="text-center">Jabatan</th>
                            <th class="text-center">Unit Kerja</th>
                            <th class="text-center">Tipe Pegawai</th>
                            <th class="text-center">Foto</th>                   
                            <th class="text-center" style="width: 15%;">Profile</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($pegawai as $peg) { ?>
                        <tr>
                        <td class="text-center"><?php echo $counter++; ?>.</td>
                            <td class="text-center"><?php echo $peg->nip_pegawai; ?></td>
                            <td class="text-center"><?php echo $peg->nama_pegawai; ?></td>
                            <td class="d-sm-table-cell"><?php echo $peg->golongan_pegawai; ?></td>
                            <td class="d-sm-table-cell"><?php echo $peg->jabatan_pegawai; ?></td>
                            <td class="d-sm-table-cell"><?php echo $peg->nama_unit; ?></td>
                            <td class="d-sm-table-cell"><?php echo $peg->tipe_pegawai; ?></td>
                            <?php if ($peg->foto_pegawai != NULL) { ?>
                            <td class="d-sm-table-cell"><img src="<?php base_url() ?>fotouploads/<?php echo $peg->foto_pegawai; ?>"  width="50" height="50">
                            </td>
                            <?php } else { ?>
                                <td class="d-sm-table-cell"> </td>
                            <?php } ?>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-secondary" onclick="window.location.href='<?php base_url() ?>detail-pegawai/<?php echo $peg->id_pegawai; ?>'">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal-upload<?php echo $peg->id_pegawai; ?>">
                                        <i class="fa fa-upload"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal-delete<?php echo $peg->id_pegawai; ?>">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- Fade In Modal -->
                        <div class="modal fade" id="modal-upload<?php echo $peg->id_pegawai; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <?php echo form_open_multipart('admin/detailpegawai/uploadPhoto/'.$peg->id_pegawai); ?>
                                        <div class="block block-themed block-transparent mb-0">
                                            <div class="block-header bg-primary-dark">
                                                <h3 class="block-title">Upload Foto</h3>
                                                <div class="block-options">
                                                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                        <i class="si si-close"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="block-content">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-username">Upload Foto</label>
                                                    <div class="col-8">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="example-file-input-custom" name="foto" required>
                                                            <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="submit" value="submit" class="btn btn-alt-success">
                                                <i class="fa fa-upload"></i> Upload
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- END Fade In Modal -->
                        <!-- Fade In Modal -->
                        <div class="modal fade" id="modal-delete<?php echo $peg->id_pegawai; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="block block-themed block-transparent mb-0">
                                        <div class="block-header bg-pulse-light">
                                            <h3 class="block-title">Apakah anda yakin anda ingin menghapus pegawai ini? </h3>
                                            <div class="block-options">
                                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                    <i class="si si-close"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancel</button>
                                        <form action="<?php echo base_url(); ?>admin/pegawai/deletePegawai/<?php echo $peg->id_pegawai; ?>" method="post">
                                            <button type="submit" name="submit" class="btn btn-alt-danger"  value="submit">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Fade In Modal -->
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full Pagination -->
    </div>
    <!-- END Page Content -->
</main>



<?php $this->load->view("partials/footer.php") ?>
