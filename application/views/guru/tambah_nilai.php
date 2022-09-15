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
                <i class="icon-table"></i>Form Tambah Nilai
              </h5>
               <?php echo $this->session->flashdata('save_nilai'); ?>
                                    <form  action="<?php echo base_url('index.php/guru/simpan_nilai') ?>" name="autoSumForm" id="sum" class="form-horizontal" method="post">
            </div>

            <div class="widget-body">
              <div class="widget-main no-padding">

               
                  <table width="100%" border="1" cellspacing="2" cellpadding="2">
                    <input type="hidden" id="nama" name="nama" value="<?php echo $nama; ?>" class="form-control" readonly/>

                    <div class="form-group">
                        <label class="control-label col-lg-4">ID Nilai</label>
                         <div class="col-lg-3">
                         <input type="text" id="id_nilai" name="id_nilai" class="form-control" value="N<?= mt_rand(1, 9999999999) ?>" readonly/>
                    </div>

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

                      <div class="form-group">
                      <label class="control-label col-lg-4">Mata Pelajaran</label>
                      <div><label for="mapel"></label>
                      <label>
                      <select name="mapel" id="mapel">
                      <?php
                      foreach($mapel->result_array() as $d)
                      {
                      ?>
                      <option value="<?php echo $d['mapel']; ?>"><?php echo $d['mapel']; ?></option>
                      <?php
                      }
                        ?>
                      </select>
                    </label></div>
                  </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Semester</label>
                                            <div class="col-lg-3">
                                                <input type="text" id="semester" name="semester" class="form-control" />
                                            </div>

                                        </div>
                         <div class="form-group">
                                            <label class="control-label col-lg-4">KKM</label>
                                            <div class="col-lg-3">
                                                <input type="text" id="kkm" name="kkm" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                    <label class="control-label col-lg-4">Nilai Harian</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" id="nh" name="nh" class="form-control" onfocus="startCalc();" onblur="stopCalc();" />
                                                    </div>
                                                </div>
                                        <div class="form-group">
                                                    <label class="control-label col-lg-4">Nilai Harian 2</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" id="nh2" name="nh2" class="form-control" onfocus="startCalc();" onblur="stopCalc();" />
                                                    </div>
                                                </div>
                                         <div class="form-group">
                                                    <label class="control-label col-lg-4">Nilai Harian 3</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" id="nh3" name="nh3" class="form-control" onfocus="startCalc();" onblur="stopCalc();" />
                                                    </div>
                                                </div>
                                         <div class="form-group">
                                                    <label class="control-label col-lg-4">Nilai Harian 4</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" id="nh4" name="nh4" class="form-control" onfocus="startCalc();" onblur="stopCalc();" />
                                                    </div>
                                                </div>                                                                
                                        <div class="form-group">
                                                    <label class="control-label col-lg-4">Nilai UTS</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" id="uts" name="uts" class="form-control" onfocus="startCalc();" onblur="stopCalc();" />
                                                    </div>
                                                </div>
                                        <div class="form-group">
                                                    <label class="control-label col-lg-4">Nilai UAS</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" id="uas" name="uas" class="form-control" onfocus="startCalc();" onblur="stopCalc();" />
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="control-label col-lg-4">Nilai Pengetahuan</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" id="n_peng" name="n_peng" class="form-control" onfocus="startCalc();" onfocus="startAkhir();" onblur="stopCalc();" onblur="stopAkhir()"; readonly  />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-lg-4">Predikat</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" id="predikat" name="predikat" class="form-control" onblur="stopCalc();" readonly  />
                                                    </div>
                                                </div>
                                        <div class="form-group">
                                                    <label class="control-label col-lg-4">Deskripsi</label>
                                                    <div class="col-lg-4">
                                                        <input type="autosize" id="deskrip" name="deskrip" class="form-control"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                            <div class="form-group">
                                                    <label class="control-label col-lg-4">Nilai Praktek</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" id="np" name="np" class="form-control" onchange="startHitung();" onfocus="startHitung();" onblur="stopHitung();"  />
                                                    </div>
                                                </div>
                                        <div class="form-group">
                                                    <label class="control-label col-lg-4">Nilai Praktek 2</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" id="np2" name="np2" class="form-control" onfocus="startHitung();" onblur="stopHitung();" />
                                                    </div>
                                                </div>
                                         <div class="form-group">
                                                    <label class="control-label col-lg-4">Nilai Praktek 3</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" id="np3" name="np3" class="form-control" onfocus="startHitung();" onblur="stopHitung();" />
                                                    </div>
                                                </div>
                                         <div class="form-group">
                                                    <label class="control-label col-lg-4">Nilai Praktek 4</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" id="np4" name="np4" class="form-control" onfocus="startHitung();" onblur="stopHitung();" />
                                                    </div>
                                                </div>                                                                
                                                 <div class="form-group">
                                                    <label class="control-label col-lg-4">Nilai Ketrampilan</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" id="nketram" name="nketram" class="form-control" onfocus="startHitung();" onfocus="startAkhir();" onblur="stopHitung();" onblur="stopAkhir();" readonly  />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-lg-4">Predikat</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" id="pred" name="pred" class="form-control" onblur="stopHitung();" readonly  />
                                                    </div>
                                                </div>
                                        <div class="form-group">
                                                    <label class="control-label col-lg-4">Deskripsi</label>
                                                    <div class="col-lg-6">
                                                        <input type="autosize" id="deskripsi" name="deskripsi" class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-lg-4">Nilai Raport</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" id="n_raport" name="n_raport" class="form-control" onblur="stopHitung();" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-lg-12">
                                             <div class="form-group">
                                        <div class="form-actions no-margin-bottom col-lg-12" align="right">
                                            <tr>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                            
                                                  <div><button class="btn btn-small btn-primary"><i class="icon-download-alt"></i>Simpan Data</button> <a href="<?php echo base_url();?>index.php/guru/nilai" class="btn btn-danger btn-small"> <i class="icon-external-link"></i> Kembali </a>  <input type="reset" value="Reset"  class="btn btn-danger btn-small" />
                                                  <input type="hidden" name="stts" value="tambah"></div>
                                           
                                           </div>
                                       </div>
                                        </div>
                                    </div>
                                  </form>

                                </div>
                            </div>
                        </div>
            <!--END PAGE CONTENT -->
                    </div>
         <!-- END RIGHT STRIP  SECTION -->
    </div>

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


    <script>

          function startCalc() {
              interval = setInterval("calc()",1);}
          function calc(){
              nh=parseInt(document.autoSumForm.nh.value);
              nh2=parseInt(document.autoSumForm.nh2.value);
              nh3=parseInt(document.autoSumForm.nh3.value);
              nh4=parseInt(document.autoSumForm.nh4.value);
              uts=parseInt(document.autoSumForm.uts.value);
              uas=parseInt(document.autoSumForm.uas.value);

          document.autoSumForm.n_peng.value=((nh+nh2+nh3+nh4)/4)*0.4 + ((uts+uas)/2)*0.6;
                                        
          if (document.autoSumForm.n_peng.value>=85) {
              document.autoSumForm.predikat.value="A";
          }else if (document.autoSumForm.n_peng.value>=80) {
              document.autoSumForm.predikat.value="A-";
          }else if (document.autoSumForm.n_peng.value>=75) {
              document.autoSumForm.predikat.value="B+";
          }else if (document.autoSumForm.n_peng.value>=70) {
               document.autoSumForm.predikat.value="B";
          }else if (document.autoSumForm.n_peng.value>=65) {
              document.autoSumForm.predikat.value="B-";
          }else if (document.autoSumForm.n_peng.value>=60) {
              document.autoSumForm.predikat.value="C+";
          }else if (document.autoSumForm.n_peng.value>=55) {
              document.autoSumForm.predikat.value="C";
          }else if (document.autoSumForm.n_peng.value>=50) {
              document.autoSumForm.predikat.value="C-";
          }else if (document.autoSumForm.n_peng.value>=45) {
              document.autoSumForm.predikat.value="D+";
          }else if (document.autoSumForm.n_peng.value>=40) {
              document.autoSumForm.predikat.value="D";
          }else if (document.autoSumForm.n_peng.value>=10) {
              document.autoSumForm.predikat.value="E";
          }else{
              (document.autoSumForm.n_peng.value>100);
              document.autoSumForm.predikat.value="Nilai Salah";
          }

          }
                                    
          function stopCalc(){
              clearInterval(interval);   
          }
    </script>

    <script>
          function startHitung() {
              interval = setInterval("hitung()",1);}
          function hitung(){
              np=parseInt(document.autoSumForm.np.value);
              np2=parseInt(document.autoSumForm.np2.value);
              np3=parseInt(document.autoSumForm.np3.value);
              np4=parseInt(document.autoSumForm.np4.value);
              nketram=parseInt(document.autoSumForm.nketram.value);
              n_peng=parseInt(document.autoSumForm.n_peng.value);

              document.autoSumForm.nketram.value=(np+np2+np3+np4)/4;
              document.autoSumForm.n_raport.value=(n_peng+nketram)/2;
                                        
              if(document.autoSumForm.nketram.value>=85) {
                  (document.autoSumForm.pred.value="A");
              }else if(document.autoSumForm.nketram.value>=80) {
                  document.autoSumForm.pred.value="A-";
              }else if(document.autoSumForm.nketram.value>=75) {
                  document.autoSumForm.pred.value="B+";
              }else if(document.autoSumForm.nketram.value>=70) {
                  document.autoSumForm.pred.value="B";
              }else if(document.autoSumForm.nketram.value>=65) {
                  document.autoSumForm.pred.value="B-";
              }else if(document.autoSumForm.nketram.value>=60) {
                  document.autoSumForm.pred.value="C+";
              }else if(document.autoSumForm.nketram.value>=55) {
                  document.autoSumForm.pred.value="C";
              }else if(document.autoSumForm.nketram.value>=50) {
                  document.autoSumForm.pred.value="C-";
              }else if(document.autoSumForm.nketram.value>=45) {
                  document.autoSumForm.pred.value="D+";
              }else if(document.autoSumForm.nketram.value>=40) {
                  document.autoSumForm.pred.value="D";
               }else if(document.autoSumForm.nketram.value>=10) {
                   document.autoSumForm.pred.value="E";
              }else{
                  (document.autoSumForm.nketram.value>100);
                  document.autoSumForm.pred.value="Nilai Salah";
              }
              }
                                    
              function stopHitung(){
                  clearInterval(interval);   
              }
    </script>

    <script>
         function startAkhir() {
         interval = setInterval("akhir()",1);}
         function akhir(){
            nketram=parseInt(document.autoSumForm.nketram.value);
            n_peng=parseInt(document.autoSumForm.n_peng.value);

            
        }
            function stopAkhir(){
              clearInterval(interval);   
             }
    </script>
        </body>

        </html>