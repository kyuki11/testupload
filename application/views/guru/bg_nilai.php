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
                                            <?php
                                                                echo ' <a class="btn btn-warning" href="'.base_url().'index.php/guru/pdf2/'.' "<i class="fa fa-file"></i>PDF</a> <a href="'.base_url().'index.php/guru/tambah_nilai" class="btn btn-primary float-right"<i class ="icon-edit"></i> Tambah Data</a>';
                                                                ?>
                                            <h5 class="bigger lighter">
                                                <i class="icon-table"></i>Data Master Nilai Siswa</h5>
                                                <?php echo $this->session->flashdata('save_nilai'); ?>
                                        </div>

                                        <div class="widget-body">
                                            <div class="widget-main no-padding">
                                                <table width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="1129" align="left">
                                                                <i class="icon-user"></i>
                                                                <span class="label label-large label-pink arrowed-right">DATA NILAI SISWA</span><span class="label label-warning arrowed arrowed-right"> <?php $query = $this->db->query("select * from nilai");
                                                                echo $query->num_rows();
                                                                ?></span> <span class="label label-warning arrowed arrowed-left">Data</span></th>
                                                                
                                                        </tr>
                                                     
                                                    </thead>

                                                <tbody>
                                                        <tr>
                                                            <td class=""><table width="100%" border="1" style="border-collapse:collapse" cellspacing="2" cellpadding="2" class="table table-striped table-bordered table-hover">
                                                            <tr>
                                                                
                                                                <td><div align='center'>NIS</b></td>
                                                                <td><div align='center'>Nama</b></td>
                                                                <th><div align='center'>Kelas</th></div>
                                                                <th><div align='center'>Mapel</th></div>
                                                                <th><div align='center'>UTS</th></div>
                                                                <th><div align='center'>UAS</th></div>
                                                                <th><div align='center'>Nilai Raport</th></div>
                                                                <th><div align='center'>Action</th>
                                                                <td colspan="2">
                                                                
                                                                </td>
                                                            </tr>
                                                          

                                                            <?php
                                                            foreach ($nilai->result_array() as $d)
                                                            {
                                                            ?>
                                                            <tr>
                                                                
                                                                <td><?php echo $d ['nis']; ?></td>
                                                                <td><?php echo $d ['nama_lengkap']; ?></td>
                                                                <td><?php echo $d ['kelas']; ?></td>
                                                                <td><?php echo $d ['mapel']; ?></td>
                                                                <td><?php echo $d ['uts']; ?></td>
                                                                <td><?php echo $d ['uas']; ?></td>
                                                                <td><?php echo $d ['n_raport']; ?></td>
                                                                <td><?php
                                                                echo '<a href="'.base_url().'index.php/guru/edit_nilai/'.$d['id_nilai'].' "class="badge badge-primary">Edit</a>
                                                                
                                                                <a href="'.base_url().'index.php/guru/hapus_nilai/'.$d['id_nilai'].'"
                onClick=\'return confirm("Anda yakin ingin menghapus data ini...?? :(")\' class="badge badge-danger" >Hapus</a>

                <a class="badge badge-warning" href="'.base_url().'index.php/guru/pdf/'.$d['nis'].' "<i class="fa fa-file"></i>PDF</a>';
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

