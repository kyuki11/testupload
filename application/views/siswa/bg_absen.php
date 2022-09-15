        <?php 
            echo $header;
        ?>

        <?php 
            echo $sidebar;
        ?>

        <?php 
            echo $topbar;
        ?>
                         <div class="page-content">
                    <div class="row-fluid">
                        <div class="span12">
                            <!--PAGE CONTENT BEGINS-->

                            <!--PAGE CONTENT ENDS-->
                        <div class="widget-box">
                                        <div class="widget-header header-color-blue">

                                              
                                            <h5 class="bigger lighter">
                                                <i class="icon-table"></i>Data Master Absensi Siswa</h5>
                                                
                                        </div>

                                        <div class="widget-body">
                                            <div class="widget-main no-padding">
                                                <table width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="1129" align="left">
                                                                <i class="icon-user"></i>
                                                                <span class="label label-large label-pink arrowed-right">DATA ABSENSI SISWA</span><span class="label label-warning arrowed arrowed-right"> <?php $query = $this->db->query("select * from absen");
                                                                echo $query->num_rows();
                                                                ?></span> <span class="label label-warning arrowed arrowed-left">Data</span></th>
                                                                
                                                        </tr>
                                                     
                                                    </thead>

                                                    <tbody>
                                                        <tr>
                                                            <td class=""><table width="100%" border="1" style="border-collapse:collapse" cellspacing="2" cellpadding="2" class="table table-striped table-bordered table-hover">
                                                              <tr>
                                                                <td width="25%"><b>NIS Siswa</b></td>
                                                                <td width="25%"><b>Nama</b></td>
                                                                <td width="10%"><b>Kelas</b></td>
                                                                <td width="15%"><b>Sakit</b></td>
                                                                <td width="10%"><b>Izin</b></td>
                                                                <td width="30%"><b>Tanpa Keterangan</b></td>
                                                                <td width="10%"><b>Pengaturan</b></td>
                                                                <td colspan="2">
                                                                
                                                                </td>
                                                              </tr>
                                                              <?php
                                                              foreach ($absen->result_array() as $d)
                                                              {
                                                              ?>
                                                              <tr>
                                                                <td><?php echo $d ['nis']; ?></td>
                                                                <td><?php echo $d ['nama_lengkap']; ?></td>
                                                                <td><?php echo $d ['kelas']; ?></td>
                                                                <td><?php echo $d ['sakit']; ?></td>
                                                                <td><?php echo $d ['izin']; ?></td>
                                                                <td><?php echo $d ['tk']; ?></td>
                                                                
                                                              </tr>
                                                              <?php
                                                              }
                                                              ?>
                                                            </table>
                                                            <div class="pagination pull-left no-margin"><br>
                                                            <?php
                                                                echo $paginator;
                                                            ?>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                          </div>
                                        </div>
                                    </div>
                                </div></div><!--/.span-->
                    </div><!--/.row-fluid-->
                </div><!--/.page-content-->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?php echo base_url();?>index.php/welcome">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('files/');?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('files/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('files/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('files/');?>js/sb-admin-2.min.js"></script>

       <!-- Page level plugins -->
    <script src="<?php echo base_url('files/');?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('files/');?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('files/');?>js/demo/datatables-demo.js"></script>

</body>

</html>

