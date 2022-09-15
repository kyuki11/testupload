        <?php 
            echo $header;
        ?>

        <?php 
            echo $sidebar;
        ?>

        <?php 
            echo $topbar;
        ?>
        <div id="content">
                        <div class="widget-box">
                                        <div class="widget-header header-color-blue">
                                            <h5 class="bigger lighter">
                                                <i class="icon-table"></i>Form Absen Siswa</h5>
                                        </div>

                                        <div class="widget-body">
                                            <div class="widget-main no-padding">
                                            
                                            <?php echo $this->session->flashdata('save_absen'); ?>
                                            <form action="<?php echo base_url();?>index.php/guru/simpan_absen" method="post">
                                              <table width="100%" border="1" cellspacing="2" cellpadding="2">
                                          <div class="form-group">

                          <div class="form-group">
                          <label class="control-label col-lg-4">NIS</label>
                          <div><label for="nis"></label>
                          <label>
                          <select name="nis" id="nis">
                            <option value="">-Pilih-</option>
                            <?php
                            foreach ($siswa->result_array() as $d) {
                            ?>
                              <option value="<?php echo $d['nis']; ?>"><?php echo $d['nis'].'-'.$d['nama_lengkap']; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                        </label>
                      </div>
                      <div class="form-group">
                      <div class="control-label col-lg-4">Nama Lengkap</div>
                      <div><label for="nama_lengkap"></label>
                        <label>
                          <input id="nama_lengkap" name="nama_lengkap" type="text" placeholder="" class="form-control input-md" required="">
                        </label>
                      </div>
                   
                   <div class="form-group">
                      <div class="control-label col-lg-4">kelas</div>
                      <div><label for="kelas"></label>
                        <label>
                          <input id="kelas" name="kelas" type="text" placeholder="" class="form-control input-md" required="">
                        </label>
                      </div>

                                                <div>
                                                  <div>Sakit</div>
                                                  <div><label for="sakit">
                                                  <input name="sakit" type="text" id="sakit" size="50"></div></label>
                                                </div>

                                                <div>
                                                  <div>Izin</div>
                                                  <div><label for="izin">
                                                  <input name="izin" type="text" id="izin" size="50"></div></label>
                                                </div>

                                                <div>
                                                  <div>Tanpa Keterangan</div>
                                                  <div><label for="tk">
                                                  <input name="tk" type="text" id="tk" size="50"></div></label>
                                                </div>
                                                  <div><button class="btn btn-small btn-primary"><i class="icon-download-alt"></i>Simpan Data</button> <a href="<?php echo base_url();?>index.php/guru/absen" class="btn btn-danger btn-small"> <i class="icon-external-link"></i> Kembali </a>
                                                  <input type="hidden" name="stts" value="tambah"></div>
                                              
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
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/welcome">Logout</a>
              </div>
            </div>
          </div>
        </div>


        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo base_url('files/'); ?>vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url('files/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url('files/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url('files/'); ?>js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="<?php echo base_url('files/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url('files/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="<?php echo base_url('files/'); ?>js/demo/datatables-demo.js"></script>

<!-- script siswa -->
        <script>
          $(document).ready(function() {

            $(document).keypress(function(event) {
              if (event.which == '13') {
                event.preventDefault();
              }
            })

            //yang dilakukan ketika isi input nis berubah
            $('#nis').on('change', function() {

              const url_get_all_siswa = $('#content').data('url') + '/get_all_siswa'
              $.ajax({
                url: url_get_all_siswa,
                type: 'POST',
                dataType: 'json',
                data: {
                  nis: $(this).val()
                },
                success: function(data) {
                  $('input[name="nama_lengkap"]').val(data.nama_lengkap).prop('readonly', true)
                  $('input[name="kelas"]').val(data.kelas).prop('readonly', true)
                }
              })
            })
          })
        </script>

</body>

</html>

