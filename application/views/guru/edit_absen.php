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
                        <i class="icon-table"></i>
                        Form Edit Absen Siswa
                      </h5>

                    </div>

                    <div class="widget-body">
                      <div class="widget-main no-padding">
                                           
                                           <?php echo $this->session->flashdata('save_absen'); ?>
                                            
                                              <form  action="<?php echo base_url('index.php/guru/simpan_absen') ?>" name="autoSumForm" id="sum" class="form-horizontal" method="post">
                                              <table width="60%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover">
                                              <?php
                        foreach ($absen->result_array() as $m)
                        {
                        ?>
                                                <div>
                                                  <div class="form-group">NIS Siswa</div>
                                                  <div width="71%"><label for="id_siswa"></label>
                                                  <label>
                                                    <input name="nis" type="text" id="nis" size="50" value="<?php echo $m['nis']; ?>" readonly/>
                                                  </label></div>
                                                </div>

                                                <div>
                                                  <div class="form-group">Nama</div>
                                                  <div width="71%"><label for="nama_lengkap"></label>
                                                  <label>
                                                    <input name="nama_lengkap" type="text" id="nama_lengkap" size="50" value="<?php echo $m['nama_lengkap']; ?>" readonly/>
                                                  </label></div>
                                                </div>

                                                <div>
                                                  <div class="form-group">Kelas</div>
                                                  <div width="71%"><label for="kelas"></label>
                                                  <label>
                                                    <input name="kelas" type="text" id="kelas" size="50" value="<?php echo $m['kelas']; ?>" readonly/>
                                                  </label></div>
                                                </div>

                                                <div class="form-group">
                                            <label class="control-label col-lg-4">Sakit</label>
                                            <div class="col-lg-3">
                                                <input type="text" id="sakit" name="sakit" class="form-control" value="<?php echo $m['sakit']; ?>" />
                                            </div>

                                                <div class="form-group">
                                            <label class="control-label col-lg-4">Izin</label>
                                            <div class="col-lg-3">
                                                <input type="text" id="izin" name="izin" class="form-control" value="<?php echo $m['izin']; ?>" />
                                            </div>

                                                <div class="form-group">
                                            <label class="control-label col-lg-4">Tanpa Keterangan</label>
                                            <div class="col-lg-3">
                                                <input type="text" id="tk" name="tk" class="form-control" value="<?php echo $m['tk']; ?>" />
                                            </div>
                                                
                                                <tr>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td><button class="btn btn-small btn-primary"><i class="icon-download-alt"></i> Simpan Data</button> <a href="<?php echo base_url();?>index.php/guru/absen" class="btn btn-danger btn-small"> <i class="icon-external-link"></i>Kembali</a>
                                                  <input type="hidden" name="nis" value="<?php echo $m['nis']; ?>">
                                                  <input type="hidden" name="stts" value="edit"></td>
                                                </tr>
                                                <?php
                            }
                        ?>
                                              </table>
                                            </form>
                                            </div>
                    </div>
                  </div>
                </div>
                        </div><!--/.span-->
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
                        <span aria-hidden="true">??</span>
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

