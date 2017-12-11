<section class="content">
    <div class="container-fluid">
       <ol class="breadcrumb breadcrumb-bg-pink">
        <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Pinjam & Denda</a></li>
        <li class="active"><i class="material-icons">archive</i> Data Pinjam & Denda</li>
    </ol>
    <div class="block-header">
    </div>
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header bg-pink">
                    <h2><b>DATA PINJAM & DENDA PP.ANWARUL HUDA</b></h2>
                </div>
                <div class="body">
                 <div class="button-demo js-modal-buttons">
                    <button type="button" onclick="add_person()" data-color="light-blue" class="btn btn-lg bg-light-blue waves-effect"><b><i class="glyphicon glyphicon-plus"></i>  TAMBAH PINJAM & DENDA</b></button>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover dashboard-task-infos" id="tabel">
                        <thead>
                            <tr>
                                <th data-field="id" style="width: 3%;">#</th>
                                <th data-field="jenis">Jenis Peminjam</th>
                                <th data-field="Waktu">Waktu Pinjam</th>
                                <th data-field="denda">Denda</th>
                                <th data-field="aksi">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Jenis Peminjam</th>
                                <th>Waktu Pinjam</th>
                                <th>Denda</th>
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
<!-- ====================================== Untuk Input Mask ======================================= -->
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
                url: "<?php echo base_url('admin/perpus/Master_PinjamDenda/ajax_list'); ?>",
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

    function add_person()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#mdModal').modal('show');
      $('.modal-title').text('Tambah Pinjam & Denda');
    }

    function edit_person(idLamaPinjamDanDenda)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('admin/perpus/Master_PinjamDenda/ajax_edit/')?>/" + idLamaPinjamDanDenda,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="idLamaPinjamDanDenda"]').val(data.idLamaPinjamDanDenda);
            $('[name="jenisPeminjam"]').val(data.jenisPeminjam);
            $('[name="waktuPinjam"]').val(data.waktuPinjam);
            $('[name="denda"]').val(data.denda);
            
            $('#mdModal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Buku dan Kitab'); // Set title to Bootstrap modal title
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function reload_table()
    {
      dataTable.ajax.reload(null,false);
    }

    function save()
    {
      var url;
      if(save_method == 'add') 
      {
          url = "<?php echo site_url('admin/perpus/Master_PinjamDenda/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('admin/perpus/Master_PinjamDenda/ajax_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#mdModal').modal('hide');
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

    function delete_person(idBuku)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('admin/perpus/Master_PinjamDenda/ajax_delete')?>/"+idBuku,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#mdModal').modal('hide');
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
         
      }
    }

  </script>



<div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">TAMBAH PINJAM & DENDA</h4>
            </div>
            <form class="form-horizontal" action="#" id="form">
            <input type="hidden" value="" name="idLamaPinjamDanDenda"/> 
                   <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="jenisPeminjam">Peminjam</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <select class="form-control" name="jenisPeminjam" id="jenisPeminjam">
                                <option value="1">Pengasuh</option>
                                <option value="2">Pengurus</option>
                                <option value="3">Santri</option>
                                <option value="4">Warga</option>
                            </select>
                        </div>
                    </div>
                </div></br>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="waktuPinjam">Waktu Pinjam</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="waktuPinjam" name="waktuPinjam" class="form-control" placeholder="  Waktu Pinjam">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="denda">Denda</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="denda" name="denda" class="form-control" placeholder="  Denda">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="save()" class="btn btn-link waves-effect">SIMPAN</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div>