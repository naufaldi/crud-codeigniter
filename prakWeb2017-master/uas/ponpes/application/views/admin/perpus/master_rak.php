<section class="content">
    <div class="container-fluid">
       <ol class="breadcrumb breadcrumb-bg-pink">
        <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Rak Buku</a></li>
        <li class="active"><i class="material-icons">archive</i> Data Rak</li>
    </ol>
    <div class="block-header">
    </div>
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header bg-pink">
                    <h2><b>DATA RAK PP.ANWARUL HUDA</b></h2>
                </div>
                <div class="body">
                 <div class="button-demo js-modal-buttons">
                    <button type="button" onclick="add_person()" data-color="light-blue" class="btn btn-lg bg-light-blue waves-effect"><b><i class="glyphicon glyphicon-plus"></i>  TAMBAH RAK</b></button>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover dashboard-task-infos" id="tabel">
                        <thead>
                            <tr>
                                <th data-field="id" style="width: 3%;">#</th>
                                <th data-field="nis">Id Rak</th>
                                <th data-field="Waktu">Nama Rak</th>
                                <th data-field="Aksi">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Id Rak</th>
                                <th>Nama Rak</th>
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
                url: "<?php echo base_url('admin/perpus/Master_rak/ajax_list'); ?>",
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
      $('#mdModal').modal('show'); // show bootstrap modal
      $('.modal-title').text('Tambah Rak'); // Set Title to Bootstrap modal title
    }

    function edit_person(idRak)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('admin/perpus/Master_rak/ajax_edit/')?>/" + idRak,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="idRak"]').val(data.idRak);
            $('[name="namaRak"]').val(data.namaRak);
            
            $('#mdModal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Rak'); // Set title to Bootstrap modal title
            
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
          url = "<?php echo site_url('admin/perpus/Master_rak/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('admin/perpus/Master_rak/ajax_update')?>";
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

    function delete_person(idRak)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('admin/perpus/Master_rak/ajax_delete')?>/"+idRak,
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
                <h4 class="modal-title">TAMBAH RAK</h4>
            </div>
            <form class="form-horizontal" action="#" id="form">
            <input type="hidden" value="" name="idRak"/> 
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="namaRak">Nama Rak</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="namaRak" name="namaRak" class="form-control" placeholder="  Nama Rak">
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