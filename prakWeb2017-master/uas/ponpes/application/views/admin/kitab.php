<section class="content">
    <div class="container-fluid">
     <ol class="breadcrumb breadcrumb-bg-pink">
        <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Kitab</a></li>
        <li class="active"><i class="material-icons">archive</i> Data Kitab</li>
    </ol>
    <div class="block-header">
    </div>
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header bg-pink">
                    <h2><b>DATA KITAB PP.ANWARUL HUDA</b></h2>
                </div>
                <div class="body">
                   <div class="button-demo js-modal-buttons">
                    <button type="button" data-color="light-blue" class="btn btn-lg bg-light-blue waves-effect"><b><i class="glyphicon glyphicon-plus"></i>  TAMBAH KITAB</b></button>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover dashboard-task-infos" id="tabel">
                        <thead>
                            <tr>
                                <th data-field="id" style="width: 3%;">#</th>
                                <th data-field="nis">Kode Pelajaran</th>
                                <th data-field="nama">Nama Pelajaran</th>
                                <th data-field="gender">Kitab</th>
                                <th data-field="status_aktif">Kelas</th>
                                <th data-field="aksi">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Kode Pelajaran</th>
                                <th>Nama Pelajaran</th>
                                <th>Kitab</th>
                                <th>Kelas</th>
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
                url: "<?php echo base_url('admin/Kitab/datatable'); ?>",
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


    function remove(kode_pelajaran, kitab) {
        swal({
            title: '"'+kitab+'"',
            text: "Apakah anda yakin ingin menghapus Kitab ini?",
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
              url : "<?php echo site_url('admin/Kitab/delete_data/')?>/"+kode_pelajaran,
              type: "POST",
              dataType: "JSON",
              success: function(data)
              {
                reload_table();
                swal("Terhapus :(", "Data Kitab telah berhasil dihapus!", "success");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal("Erorr!", "Terjadi masalah saat penghapusan data!", "error");
            }
        });
        } else {
            swal("Dibatalkan :)", "Penghapusan Data Kitab dibatalkan!", "error");
        }
    });
    }
</script>


<div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">TAMBAH KITAB</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('admin/Kitab/tambah_kitab');?>" method="POST">
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="kode_pelajaran">Kode Pelajaran</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="kode_pelajaran" name="kode_pelajaran" class="form-control" placeholder="  Kode Pelajaran">
                            </div>
                        </div>
                    </div>
                </div></br>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="nama_pelajaran">Nama Pelajaran</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="nama_pelajaran" name="nama_pelajaran" class="form-control" placeholder="  Nama Pelajaran">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="kitab">Kitab</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="kitab" name="kitab" class="form-control" placeholder="  Kitab">
                            </div>
                        </div>
                    </div>
                </div></br>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="grade">Kelas</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <select class="form-control" name="grade" id="grade">
                                <option value="1 Awaliyah">1 Awaliyah</option>
                                <option value="2 Awaliyah">2 Awaliyah</option>
                                <option value="1 Wustho">1 Wustho</option>
                                <option value="2 Wustho">2 Wustho</option>
                                <option value="1 Ulya">1 Ulya</option>
                                <option value="2 Ulya">2 Ulya</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link waves-effect">SIMPAN</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div>