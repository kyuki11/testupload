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
                        Form Edit Nilai Siswa
                      </h5>

                    </div>

                    <div class="widget-body">
                      <div class="widget-main no-padding">
                                           
                                           <?php echo $this->session->flashdata('save_nilai'); ?>
                                            
                                              <form  action="<?php echo base_url('index.php/guru/simpan_nilai') ?>" name="autoSumForm" id="sum" class="form-horizontal" method="post">
                                              <table width="60%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover">
                                              <?php
                        foreach ($nilai->result_array() as $m)
                        {
                        ?>
                                                <div>
                                                  <div class="form-group">NIS</div>
                                                  <div width="71%"><label for="nis"></label>
                                                  <label>
                                                    <input name="nis" type="text" id="nis" size="50" value="<?php echo $m['nis']; ?>" readonly/>
                                                  </label></div>
                                                </div>

                                                <div>
                                                  <div class="form-group">Nama siswa</div>
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

                                                <div>
                                                  <div class="form-group">Mata pelajaran</div>
                                                  <div width="71%"><label for="mapel"></label>
                                                  <label>
                                                    <input name="mapel" type="text" id="mapel" size="50" value="<?php echo $m['mapel']; ?>" readonly/>
                                                  </label></div>
                                                </div>

                                                <div class="form-group">
                                            <label class="control-label col-lg-4">Semester</label>
                                            <div class="col-lg-3">
                                                <input type="text" id="semester" name="semester" class="form-control" value="<?php echo $m['semester']; ?>" />
                                            </div>

                                        </div>
                         <div class="form-group">
                                            <label class="control-label col-lg-4">KKM</label>
                                            <div class="col-lg-3">
                                                <input type="text" id="kkm" name="kkm" class="form-control" value="<?php echo $m['kkm']; ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                    <label class="control-label col-lg-4">Nilai Harian</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" id="nh" name="nh" class="form-control" onfocus="startCalc();" onblur="stopCalc();" value="<?php echo $m['nh']; ?>"/>
                                                    </div>
                                                </div>
                                        <div class="form-group">
                                                    <label class="control-label col-lg-4">Nilai Harian 2</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" id="nh2" name="nh2" class="form-control" onfocus="startCalc();" onblur="stopCalc();" value="<?php echo $m['nh2']; ?>"/>
                                                    </div>
                                                </div>
                                         <div class="form-group">
                                                    <label class="control-label col-lg-4">Nilai Harian 3</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" id="nh3" name="nh3" class="form-control" onfocus="startCalc();" onblur="stopCalc();" value="<?php echo $m['nh3']; ?>"/>
                                                    </div>
                                                </div>
                                         <div class="form-group">
                                                    <label class="control-label col-lg-4">Nilai Harian 4</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" id="nh4" name="nh4" class="form-control" onfocus="startCalc();" onblur="stopCalc();" value="<?php echo $m['nh4']; ?>"/>
                                                    </div>
                                                </div>                                                                
                                        <div class="form-group">
                                                    <label class="control-label col-lg-4">Nilai UTS</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" id="uts" name="uts" class="form-control" onfocus="startCalc();" onblur="stopCalc();" value="<?php echo $m['uts']; ?>"/>
                                                    </div>
                                                </div>
                                        <div class="form-group">
                                                    <label class="control-label col-lg-4">Nilai UAS</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" id="uas" name="uas" class="form-control" onfocus="startCalc();" onblur="stopCalc();" value="<?php echo $m['uas']; ?>"/>
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
                                                        <input type="autosize" id="deskrip" name="deskrip" class="form-control" value="<?php echo $m['deskrip']; ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                            <div class="form-group">
                                                    <label class="control-label col-lg-4">Nilai Praktek</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" id="np" name="np" class="form-control" onchange="startHitung();" onfocus="startHitung();" onblur="stopHitung();" value="<?php echo $m['np']; ?>"/>
                                                    </div>
                                                </div>
                                        <div class="form-group">
                                                    <label class="control-label col-lg-4">Nilai Praktek 2</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" id="np2" name="np2" class="form-control" onfocus="startHitung();" onblur="stopHitung();" value="<?php echo $m['np2']; ?>"//>
                                                    </div>
                                                </div>
                                         <div class="form-group">
                                                    <label class="control-label col-lg-4">Nilai Praktek 3</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" id="np3" name="np3" class="form-control" onfocus="startHitung();" onblur="stopHitung();" value="<?php echo $m['np3']; ?>"//>
                                                    </div>
                                                </div>
                                         <div class="form-group">
                                                    <label class="control-label col-lg-4">Nilai Praktek 4</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" id="np4" name="np4" class="form-control" onfocus="startHitung();" onblur="stopHitung();" value="<?php echo $m['np4']; ?>"//>
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
                                                        <input type="autosize" id="deskripsi" name="deskripsi" class="form-control" value="<?php echo $m['deskripsi']; ?>"//>
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

                                                
                                                
                                                <tr>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td><button class="btn btn-small btn-primary"><i class="icon-download-alt"></i> Simpan Data</button> <a href="<?php echo base_url();?>index.php/guru/nilai" class="btn btn-danger btn-small"> <i class="icon-external-link"></i>Kembali</a>
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

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('files/');?>js/sb-admin-2.min.js"></script>

       <!-- Page level plugins -->
    <script src="<?php echo base_url('files/');?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('files/');?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('files/');?>js/demo/datatables-demo.js"></script>

</body>

</html>

