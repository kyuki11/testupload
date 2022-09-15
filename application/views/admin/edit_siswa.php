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
                        Form Edit Siswa
                      </h5>

                    </div>

                    <div class="widget-body">
                      <div class="widget-main no-padding">
                                           
                                           <?php echo $this->session->flashdata('save_siswa'); ?>
                                            <form action="<?php echo base_url();?>index.php/admin/simpan_siswa" method="post">
                                              <table width="60%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover">
                                              <?php
                        foreach ($siswa->result_array() as $m)
                        {
                        ?>
                                             
                                                <tr>
                                                  <td width="21%" align="right">ID</td>
                                                  <td width="4%" align="center">:</td>
                                                  <td><b><?php echo $m ['id']; ?></td></b>
                                                </tr>
                                                <tr>
                                                  <td align="right">NIS</td>
                                                  <td align="center">:</td>
                                                  <td><label>
                                                    <input name="nis" type="text" id="nis" size="50" value="<?php echo $m['nis']; ?>">
                                                  </label></td>
                                                </tr>
                                                <tr>
                                                  <td align="right">Nama Lengkap</td>
                                                  <td align="center">:</td>
                                                  <td><label>
                                                    <input name="nama_lengkap" type="text" id="nama_lengkap" size="50" value="<?php echo $m['nama_lengkap']; ?>">
                                                  </label></td>
                                                </tr>
                                                <tr>
                                                  <td width="21%" align="right">Kelas</td>
                                                  <td width="4%" align="center">:</td>
                                                  <td width="75%"><label for="kelas"></label>
                                                    <select name="kelas" id="kelas">
                                                      <option></option>
                                                      <option value="1A">1A</option>
                                                      <option value="1B">1B</option>
                                                      <option value="2A">2A</option>
                                                      <option value="2B">2B</option>
                                                      <option value="3A">3A</option>
                                                      <option value="3B">3B</option>
                                                      <option value="4A">4A</option>
                                                      <option value="4B">4B</option>
                                                      <option value="5A">5A</option>
                                                      <option value="5B">5B</option>
                                                      <option value="6A">6A</option>
                                                      <option value="6B">6B</option>
                                                  </select></td>
                                                </tr>
                                                <tr>
                                                  <td align="right">Tempat Lahir</td>
                                                  <td align="center">:</td>
                                                  <td><label>
                                                    <input name="tmpt_lhr" type="text" id="tmpt_lhr" size="50" value="<?php echo $m['tmpt_lhr']; ?>">
                                                  </label></td>
                                                </tr>
                                                <tr>
                                                  <td align="right">Tanggal Lahir</td>
                                                  <td align="center">:</td>
                                                  <td><label>
                                                    <input type="date" id="tnggl_lhr" name="tnggl_lhr" value="<?php echo $m['tnggl_lhr'];?>" class="form-control" />
                                                  </label></td>
                                                </tr>
                                                <tr>
                                                  <td width="21%" align="right">Jenis Kelamin</td>
                                                  <td width="4%" align="center">:</td>
                                                  <td width="75%"><b><label>
                        <input class="uniform" type="checkbox" name="jk" id="jk" value="Laki-laki"/> Laki-laki
                      </label><label>
                        <input class="uniform" type="checkbox" name="jk" id="jk" value="Perempuan"/> Perempuan
                      </label></b></td>
                                                </tr>
                                                <tr>
                                                  <td align="right">Agama</td>
                                                  <td align="center">:</td>
                                                  <td><label for="agama"></label>
                                                    <select name="agama" id="agama">
                                                      <option></option>
                                                      <option value="Islam">Islam</option>
                                                      <option value="Protestan">Protestan</option>
                                                      <option value="Hindu">Hindu</option>
                                                      <option value="Budha">Budha</option>
                                                      <option value="Katolik">Katolik</option>
                                                      <option value="Konghucu">Konghucu</option>
                                                  </select></td>
                                                </tr>
                                                <tr>
                                                  <td align="right">Alamat</td>
                                                  <td align="center">:</td>
                                                  <td><label>
                                                    <input name="alamat" type="text" id="alamat" size="50" value="<?php echo $m['alamat']; ?>">
                                                  </label></td>
                                                </tr>
                                                
                                                <tr>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td><button class="btn btn-small btn-primary"><i class="icon-download-alt"></i> Simpan Data</button> <a href="<?php echo base_url();?>index.php/admin/siswa" class="btn btn-danger btn-small"> <i class="icon-external-link"></i>Kembali</a>
                                                  <input type="hidden" name="id" value="<?php echo $m['id']; ?>">
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

