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
                                                <i class="icon-table"></i>Data Master User</h5>
                                        </div>

                                        <div class="widget-body">
                                            <div class="widget-main no-padding">
                                                <table width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="1129" align="left">
                                                                <i class="icon-user"></i>
                                                                <span class="label label-large label-pink arrowed-right">DATA USER</span><span class="label label-warning arrowed arrowed-right"> <?php $query = $this->db->query("select * from tbl_login");
                                                                echo $query->num_rows();
                                                                ?></span> <span class="label label-warning arrowed arrowed-left">Data</span></th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                        <tr>
                                                            <td class=""><table width="100%" border="1" style="border-collapse:collapse" cellspacing="2" cellpadding="2" class="table table-striped table-bordered table-hover">
                                                              <tr>
                                                                <td width="7%"><b>ID</b></td>
                                                                <td width="30%"><b>Nama User</b></td>
                                                                <td width="30%"><b>Username</b></td>
                                                                <td width="10%"><b>Password</b></td>
                                                                <td width="30%"><b>Status</b></td>
                                                                <td width="20%"><b>Pengaturan</b></td>
                                                                <td colspan="2">
                                                                </td>
                                                              </tr>
                                                              <?php
                                                              foreach ($user->result_array() as $d)
                                                              {
                                                              ?>
                                                              <tr>
                                                                <td><?php echo $d ['id']; ?></td>
                                                                <td><?php echo $d ['nama_lengkap']; ?></td>
                                                                <td><?php echo $d ['username']; ?></td>
                                                                <td><?php echo $d ['password']; ?></td>
                                                                <td><?php echo $d ['stts']; ?></td>
                                                                <td><?php
                                                                echo '<a href="'.base_url().'index.php/admin/edit_user/'.$d['id'].' "class="badge badge-primary">Edit</a></td>
                                                                <td>';
            ?>
                                                                
                                                                </td>
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

<!-- Modal untuk edit data -->
<?php $no = 0;
foreach ($user->result_array() as $d) : $no++; ?>
 <div class="modal fade" id="edit<?php echo$d['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Form Edit Data User</h5>
                                  </div>
                                  <div class="modal-body">
                                    <?php echo form_open_multipart('admin/proses_edit_data_user');?> 

                                    <input type="hidden" name="nama" value="<?php echo $d['id'];?>">

                                   
                                    <div class="form-group">
                                        <label>ID</label>
                                       
                                    </div>  
                                    <div class="form-group">
                                        <label><td><?php echo $d ['id']; ?></td></label>
                                    </div>  
           
                                    <div class="form-group">
                                        <label>Nama User</label>
                                        <input typy="text" name="stok" class="form-control" value="<?php echo $d['nama_lengkap'];?>">
                                    </div>  

                                    <div class="form-group">
                                        <label>Username</label>
                                        <input typy="text" name="harga" class="form-control" value="<?php echo $d['username'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input typy="text" name="harga" class="form-control" value="<?php echo $d['password'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <input typy="text" name="harga" class="form-control" value="<?php echo $d['stts'];?>">
                                    </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <?php echo form_close() ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php endforeach; ?>
<!-- akhir modal edit -->