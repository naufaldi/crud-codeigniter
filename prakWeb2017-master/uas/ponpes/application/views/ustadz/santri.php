<section class="content">
    <div class="container-fluid">
     <ol class="breadcrumb breadcrumb-bg-pink">
        <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Santri</a></li>
        <li class="active"><i class="material-icons">archive</i> Data Santri</li>
    </ol>
    <div class="block-header">
    </div>
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header bg-pink">
                    <h2><b>DATA SANTRI PP.ANWARUL HUDA</b></h2>
                </div>
                <div class="body">
                   <div class="button-demo js-modal-buttons">
                    <button type="button" data-color="light-blue" class="btn btn-lg bg-light-blue waves-effect"><b><i class="glyphicon glyphicon-plus"></i>  TAMBAH SANTRI</b></button>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover dashboard-task-infos" id="tabel">
                        <thead>
                            <tr>
                                <th data-field="id" style="width: 3%;">#</th>
                                <th data-field="nis">NIS</th>
                                <th data-field="nama">Nama</th>
                                <th data-field="gender">Jenis Kelamin</th>
                                <th data-field="status_aktif">Status</th>
                                <th data-field="gender">Nama Wali</th>
                                <th data-field="alamat">Alamat</th>
                                <th data-field="tgl_masuk">Tanggal Masuk</th>
                                <th data-field="kamar">Kamar</th>
                                <th data-field="tempat_lahir">Tampat Lahir</th>
                                <th data-field="tgl_lahir">Tgl Lahir</th>
                                <th data-field="aksi">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                                <th>Nama Wali</th>
                                <th>Alamat</th>
                                <th>Tanggal Masuk</th>
                                <th>Kamar</th>
                                <th>Tampat Lahir</th>
                                <th>Tgl Lahir</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</section>
<script type="text/javascript">
    var save_method;
    var arr = 0;
    var dataTable;

    document.addEventListener("DOMContentLoaded", function (event) {
        datatable();
    });
    function datatable() {
        dataTable = $('#tabel').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "<?php echo base_url('admin/Santri/datatable'); ?>",
                type: "POST"
            },
            "columnDefs": [
            {
                "targets": [2, -1],
                "orderable": false,
            },
            ],
            "dom": '<"row" <"col s6 m6 l3 left"l><"col s6 m6 l3 right"f>><"bersih tengah" rt><"bottom"ip>',

        });

    }
    function reload_table() {
        dataTable.ajax.reload(null, false);
    }


    function remove(kode_ustadz, nama_santri) {
        swal({
            title: '"'+nama_santri+'"',
            text: "Apakah anda yakin ingin menghapus Santri ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#F44336',
            confirmButtonText: 'Hapus',
            cancelButtonText: "Batal",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm){
            $.ajax({
              url : "<?php echo site_url('admin/Santri/delete_data/')?>/"+kode_ustadz,
              type: "POST",
              dataType: "JSON",
              success: function(data)
              {
                reload_table();
                swal("Terhapus :(", "Data Santri telah berhasil dihapus!", "success");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal("Erorr!", "Terjadi masalah saat penghapusan data!", "error");
            }
        });
        } else {
            swal("Dibatalkan :)", "Penghapusan Data Santri dibatalkan!", "error");
        }
    });
    }
</script>


<div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">TAMBAH SANTRI</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('admin/Santri/tambah_santri');?>" method="POST">
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="NIS">NIS</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="NIS" name="NIS" class="form-control" placeholder="  NIS">
                            </div>
                        </div>
                    </div>
                </div></br>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="nama_santri">Nama Santri</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="nama_santri" name="nama_santri" class="form-control" placeholder="  Nama Santri">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="gender">Jenis Kelamin</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <select class="form-control" name="gender" id="gender">
                                <option value="1">Laki-laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="status_aktif">Status</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <select class="form-control" name="status_aktif" id="status_aktif">
                                <option value="1">Aktif</option>
                                <option value="2">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                </div></br>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="nama_wali">Nama Wali</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="nama_wali" name="nama_wali" class="form-control" placeholder="  Nama Wali">
                            </div>
                        </div>
                    </div>
                </div></br>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="alamat">Alamat</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="alamat" name="alamat" class="form-control" placeholder="  Alamat">
                            </div>
                        </div>
                    </div>
                </div></br>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="tgl_masuk">Tgl Masuk</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" id="tgl_masuk" name="tgl_masuk" class="form-control" placeholder="  Tgl Masuk">
                            </div>
                        </div>
                    </div>
                </div></br>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="kamar">Kamar</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="kamar" name="kamar" class="form-control" placeholder="  Kamar">
                            </div>
                        </div>
                    </div>
                </div></br>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label for="tmp_lahir">Tempat Lahir</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="tmp_lahir" name="tmp_lahir" class="form-control" placeholder="  Tempat Lahir">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="tgl_lahir">Tgl Lahir</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" placeholder="  Tgl Lahir">
                            </div>
                        </div>
                    </div>
                </div></br>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link waves-effect">SIMPAN</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div>