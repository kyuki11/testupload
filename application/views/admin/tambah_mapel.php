        <?php 
            echo $header;
        ?>

        <?php 
            echo $sidebar;
        ?>

        <?php 
            echo $topbar;
        ?>
                        <div class="widget-box">
                                        <div class="widget-header header-color-blue">
                                            <h5 class="bigger lighter">
                                                <i class="icon-table"></i>Form Tambah Mata Pelajaran</h5>
                                        </div>

                                        <div class="widget-body">
                                            <div class="widget-main no-padding">
                                            
                                            <?php echo $this->session->flashdata('save_mapel'); ?>
                                            <form action="<?php echo base_url();?>index.php/admin/simpan_mapel" method="post">
                                              <table width="100%" border="1" cellspacing="2" cellpadding="2">
                                                <tr>
                                                  <td width="23%" align="right">Kode Mata Pelajaran</td>
                                                  <td width="6%" align="center">:</td>
                                                  <td width="71%"><label ></label>
                                                    <label for="kd_mapel"></label>
                                                    <input name="kd_mapel" type="text" id="kd_mapel" size="50" value="C<?= mt_rand(1, 9999999999) ?>" readonly></td>
                                                </tr>
                                                <tr>
                                                  <td align="right">Nama Mata Pelajaran</td>
                                                  <td align="center">:</td>
                                                  <td><label for="mapel"></label>
                                                  <input name="mapel" type="text" id="mapel" size="50"></td>
                                                </tr>
                                                
                                                <tr>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td><button class="btn btn-small btn-primary"><i class="icon-download-alt"></i>Simpan Data</button> <a href="<?php echo base_url();?>index.php/admin/mapel" class="btn btn-danger btn-small"> <i class="icon-external-link"></i> Kembali </a>
                                                  <input type="hidden" name="stts" value="tambah"></td>
                                                </tr>
                                              </table>
                                            
                                            </form>
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

