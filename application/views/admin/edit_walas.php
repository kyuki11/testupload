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
                        Form Edit Wali Kelas
                      </h5>

                    </div>

                    <div class="widget-body">
                      <div class="widget-main no-padding">
                                           
                                           <?php echo $this->session->flashdata('save_walas'); ?>
                                            <form action="<?php echo base_url();?>index.php/admin/simpan_walas" method="post">
                                              <table width="60%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover">
                                              <?php
                        foreach ($walas->result_array() as $m)
                        {
                        ?>
                                             
                                                <tr>
                      <td width="23%" align="right">ID Guru</td>
                      <td width="6%" align="center">:</td>
                      <td width="71%"><label for="id"></label>
                        <label>
                          <select name="id" id="id">
                            <option value=""><?php echo $m ['id']; ?></option>
                            <?php
                            foreach ($guru->result_array() as $d) {
                            ?>
                              <option value="<?php echo $d['id']; ?>"><?php echo $d['id']; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                        </label>
                      </td>
                    </tr>
                    </tr>
                    <tr>
                      <td align="right">Nama Lengkap</td>
                      <td align="center">:</td>
                      <td><label for="nama_lengkap"></label>
                        <label>
                          <input id="nama_lengkap" name="nama_lengkap" type="text" placeholder="" class="form-control input-md" value="<?php echo $m['nama_lengkap']; ?>" required="">
                        </label>
                      </td>
                    </tr>
                                                <tr>
                                                  <td align="right">Kelas</td>
                                                  <td align="center">:</td>
                                                  <td><label for="kelas"></label>
                                                  <label>
                                                    <select name="kelas" id="kelas">
                                                    <?php
                                                    foreach($siswa->result_array() as $d)
                                                    {
                                                    ?>
                                                      <option value="<?php echo $d['kelas']; ?>"><?php echo $d['kelas']; ?></option>
                                                        <?php
                                                   }
                                                   ?>
                                                    </select>
                                                  </label></td>
                                                </tr>
                                                
                                                <tr>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td><button class="btn btn-small btn-primary"><i class="icon-download-alt"></i> Simpan Data</button> <a href="<?php echo base_url();?>index.php/admin/walas" class="btn btn-danger btn-small"> <i class="icon-external-link"></i>Kembali</a>
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

    <!-- script guru -->
        <script>
          $(document).ready(function() {

            $(document).keypress(function(event) {
              if (event.which == '13') {
                event.preventDefault();
              }
            })

            //yang dilakukan ketika isi input id berubah
            $('#id').on('change', function() {

              const url_get_all_guru = $('#content').data('url') + '/get_all_guru'
              $.ajax({
                url: url_get_all_guru,
                type: 'POST',
                dataType: 'json',
                data: {
                  id: $(this).val()
                },
                success: function(data) {
                  $('input[name="nama_lengkap"]').val(data.nama_lengkap).prop('readonly', true)
                  
                }
              })
            })
          })
        </script>

</body>

</html>

