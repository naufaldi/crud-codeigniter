<section class="content">
    <div class="container-fluid">
       <ol class="breadcrumb breadcrumb-bg-pink">
        <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Transaksi peminjaman</a></li>
        <li class="active"><i class="material-icons">archive</i> Transaksi Peminjaman</li>
    </ol>
    <div class="block-header">
    </div>
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header bg-pink">
                    <h2><b>Transaksi Peminjaman Buku PP.Anwarul Huda</b></h2>
                </div>
                <div class="body">
                 <div>
                    <!-- <button type="button" onclick="add_person()" data-color="light-blue" class="btn btn-lg bg-light-blue waves-effect"><b><i class="glyphicon glyphicon-plus"></i>  TAMBAH</b></button> -->
                    <button type="button"  class="btn btn-success waves-effect m-r-20" data-toggle="modal" data-target="#largeModal"><i class="glyphicon glyphicon-plus"></i> <B>TAMBAH</b></button>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover dashboard-task-infos" id="tabel">
                        <thead>
                            <tr class="success">
                                <th>Nomor Induk</th>
                                <th>Nama Santri</th>
                                <th>Alamat</th>
                                <th>Kode Buku</th>
                                <th>Judul Buku</th>
                                <th>Penerbit</th>
                                <th>Jumlah Pinjam</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th style="width:50px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr class="success">
                               <th>Nomor Induk</th>
                               <th>Nama Santri</th>
                               <th>Alamat</th>
                               <th>Kode Buku</th>
                               <th>Judul Buku</th>
                               <th>Penerbit</th>
                               <th>Jumlah Pinjam</th>
                               <th>Tanggal Peminjaman</th>
                               <th>Tanggal Pengembalian</th>
                               <th>Action</th>
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
                url: "<?php echo base_url('admin/perpus/Master_Transaksi_Peminjaman/ajax_list'); ?>",
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

    function add_person() {
      save_method = 'add';
      $('#form')[0].reset();
      $("#showjumlahBuku").html('Stok Buku');
      $('#largeModal').modal('show');
      $('.modal-title').text('Tambah Transaksi');
  }

  function delete_updatebuku(idBuku,jmlpjam) {
    $.ajax({
        url : "<?php echo site_url('admin/perpus/Master_Transaksi_Peminjaman/ajax_tampil_jumlah_buku/')?>/" + idBuku,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            var idbku = data.idBuku;
            var jmlbku = parseInt(data.jumlahBuku);
            var update_hitung= jmlpjam + jmlbku;

            $.ajax({
                url : "<?php echo site_url('admin/perpus/Master_Transaksi_Peminjaman/ajax_update_buku')?>",
                type: "POST",
                data: 'idBuku='+idbku+'&jumlahBuku='+update_hitung,
                dataType: "JSON",
                success: function(data)
                {
                   reload_table();
               },
               error: function (jqXHR, textStatus, errorThrown)
               {
                alert('Error adding / update data');
            }
        });

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Gagal update stok buku...');
        }
    });
}   

function edit_person(idPeminjaman) {
    save_method = 'update';
    $('#form')[0].reset();
    $.ajax({
        url : "<?php echo site_url('admin/perpus/Master_Transaksi_Peminjaman/ajax_edit/')?>/" + idPeminjaman,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="idPeminjaman"]').val(data.idPeminjaman);
            $('[name="NIS"]').val(data.NIS);
            $('[name="idBuku"]').val(data.idBuku);
            $('[name="jumlahPinjam"]').val(data.jumlahPinjam);
            $('[name="hiddenjumlahPinjam"]').val(data.jumlahPinjam);
            $('[name="tanggalPeminjaman"]').val(data.tanggalPeminjaman);
            $('[name="tanggalPengembalian"]').val(data.tanggalPengembalian);

            $('#largeModal').modal('show'); 
            $('.modal-title').text('Edit Transaksi');

                        tampildatasiswa($('[name="NIS"]').val()); // <========== data siswa

                        tampiljumlahbuku($('[name="idBuku"]').val()); // <========== data buku
                        
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error get data from ajax');
                    }
                });
}

function reload_table() {
  dataTable.ajax.reload(null,false);
}

function save() {
  var url;
  if(save_method == 'add') {
      url = "<?php echo site_url('admin/perpus/Master_Transaksi_Peminjaman/ajax_add')?>";
  }
  else{
    url = "<?php echo site_url('admin/perpus/Master_Transaksi_Peminjaman/ajax_update')?>";
}

$.ajax({
    url : url,
    type: "POST",
    data: $('#form').serialize(),
    dataType: "JSON",
    success: function(data)
    {

     $('#largeModal').modal('hide');
     reload_table();
 },
 error: function (jqXHR, textStatus, errorThrown)
 {
    alert('Error adding / update data');
}
});
}

function delete_person(idPeminjaman)
{
    if(confirm('Are you sure delete this data?'))
    {
        $.ajax({
            url : "<?php echo site_url('admin/perpus/Master_Transaksi_Peminjaman/ajax_edit/')?>/" + idPeminjaman,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                var jmlpjam=parseInt(data.jumlahPinjam);
                var idbku=data.idBuku;
                $.ajax({
                    url : "<?php echo site_url('admin/perpus/Master_Transaksi_Peminjaman/ajax_delete')?>/"+idPeminjaman,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                            delete_updatebuku(idbku,jmlpjam); // <========== data buku

                            $('#largeModal').modal('hide');
                            reload_table();
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error adding / update data');
                        }
                    });
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
}
</script>
<script src="<?=base_url('assets/plugins/select2/select2.full.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/input-mask/jquery.inputmask.js')?>"></script>
<script src="<?=base_url('assets/plugins/input-mask/jquery.inputmask.date.extensions.js')?>"></script>
<script src="<?=base_url('assets/plugins/input-mask/jquery.inputmask.extensions.js')?>"></script>

<script>
    $(function () {
        $(".select2").select2();
        $("#datemask").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
        $("[data-mask]").inputmask();
    });
</script>



<!-- <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">TAMBAH</h4>
            </div>
            <form class="form-horizontal" action="#" id="form">
                <input type="hidden" value="" name="idPeminjaman"/> 
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="NIS">NIS</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="NIS" name="NIS" onkeyup="tampildatasiswa(this.value)" class="form-control" placeholder="  NIS" type="hidden">
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
</div> -->

<div class="modal fade modal-primary" id="largeModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header header bg-cyan">
            <button type="button" class="close btn btn-xs" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <center><h4 class="modal-title"><font color="black">Form Peminjaman</font></h4></center>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">         
                    <input type="hidden" value="" name="idPeminjaman"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3"><font color="black">Nomor Induk</font></label>
                            <div class="col-md-9">
                                <input id="tampil" name="NIS" placeholder="Kode Siswa" class="form-control" onkeyup="tampildatasiswa(this.value)" type="text">
                                <input id="NIS" name="NIS" class="form-control" type="hidden">
                            </div>
                        </div>
                        <!-- ================ batas awal ajax tampil data ================ -->
                        <div class="form-group">

                            <label class="control-label col-md-3"></label>

                            <div class="col-md-9 ">
                                <!-- DIRECT CHAT PRIMARY -->
                                <div class="box box-primary direct-chat direct-chat-primary">
                                    <div class="box-header with-border">
                                        <center><h3 class="box-title"><font color="black"><b>Data Anggota</b></font></h3></center>
                                        <div class="box-tools pull-right">
                                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        </div>
                                    </div><!-- /.box-header -->
                                    <div class="box-body" style="color: #000; padding-left: 10px; padding-bottom: 10px; padding-right: 10px;">

                                        <div id="tampildata"> 
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nama Siswa</label>
                                                <div class="col-md-9">
                                                    <input name="nama_santri" placeholder="Nama Siswa" class="form-control" onkeyup="tampildatasiswa(this.value)" type="text" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Alamat</label>
                                                <div class="col-md-9">
                                                    <input name="alamat" placeholder="Alamat" class="form-control" type="text" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Kamar</label>
                                                <div class="col-md-9">
                                                    <input name="kamar" placeholder="Kamar" class="form-control" type="text" disabled="disabled">
                                                </div>
                                            </div>
                                        </div>

                                    </div><!-- /.box-body -->
                                </div><!--/.direct-chat -->

                            </div><!-- /.box-body -->
                            <!-- ================ batas ajax tampil data ================ -->
                        </div>

                        <script>
                            function tampildatasiswa(NIS)
                            {
                            //Ajax Load data from ajax
                            $.ajax({
                                url : "<?php echo site_url('admin/perpus/Master_Transaksi_Peminjaman/ajax_tampil_data_siswa/')?>/" + NIS,
                                type: "GET",
                                dataType: "JSON",
                                success: function(data)
                                {   $('[name="NIS"]').val(data.NIS);
                                $('[name="nama_santri"]').val(data.nama_santri);
                                $('[name="alamat"]').val(data.alamat);
                                $('[name="kamar"]').val(data.kamar);
                                $('[name="NIS"]').val(data.NIS);  
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                $('[name="nama_santri"]').val('');
                                $('[name="alamat"]').val('');
                                $('[name="kamar"]').val('');
                                $('[name="NIS"]').val('');
                            }
                        });
                        }
                    </script>
                    <!-- ================ batas bawah ajax tampil data ================ -->

                    <!-- ================ batas atas ajax tampil data ================ -->
                    <script>
                        function tampiljumlahbuku(idBuku)
                        {
                            //Ajax Load data from ajax
                            $.ajax({
                                url : "<?php echo site_url('admin/perpus/Master_Transaksi_Peminjaman/ajax_tampil_jumlah_buku/')?>/" + idBuku,
                                type: "GET",
                                dataType: "JSON",
                                success: function(data)
                                {
                                    $('#showjumlahBuku').html(data.jumlahBuku);
                                    $('#jumlahBuku').val(data.jumlahBuku);
                                    $('#jumlahhiddenStokBuku').val(data.jumlahBuku);

                                    $('[name="judulBuku"]').val(data.judulBuku);
                                    $('[name="penerbitBuku"]').val(data.penerbitBuku);          
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    $("#showjumlahBuku").html('Stok Buku');

                                    $('[name="judulBuku"]').val('');
                                    $('[name="penerbitBuku"]').val('');
                                }
                            });
                        }

                        function tampiljumlahpinjam(idBuku)
                        {
                            //Ajax Load data from ajax
                            $.ajax({
                                url : "<?php echo site_url('admin/perpus/Master_Transaksi_Peminjaman/ajax_tampil_jumlah_buku/')?>/" + idBuku,
                                type: "GET",
                                dataType: "JSON",
                                success: function(data)
                                {
                                    var hiddenjumlahPinjam = parseInt($('#hiddenjumlahPinjam').val());
                                    var jmlpinjam = parseInt($('#jumlahPinjam').val());
                                    var hjpinjam = parseInt($('#hiddenjumlahPinjam').val());
                                    var hjspinjam = $('#hiddenjumlahPinjam').val();
                                    var jml = parseInt($('#jumlahhiddenStokBuku').val());

                                        // ketika save dan update peminjaman
                                        var total;
                                        if(hjspinjam==''){
                                            total = jml - jmlpinjam;
                                        }
                                        else if(hjpinjam>0){
                                            if(hjpinjam==jmlpinjam){
                                                total = $("#showjumlahBuku").html(('#jumlahhiddenStokBuku').val());
                                            }                                           
                                            else if(jmlpinjam< hjpinjam){
                                                total = (hjpinjam - jmlpinjam) + jml;
                                            }
                                            else if(jmlpinjam>hjpinjam){
                                                total = jml - (jmlpinjam - hjpinjam);
                                            }
                                        }

                                        $("#showjumlahBuku").html(total);
                                        $("#jumlahBuku").val(total);
                                    },
                                    error: function (jqXHR, textStatus, errorThrown)
                                    {
                                        $("#showjumlahBuku").html($('#jumlahhiddenStokBuku').val());
                                        $("#jumlahBuku").val($('#jumlahhiddenStokBuku').val());
                                    }
                                });
                        }
                    </script>
                    <!-- ================ batas bawah ajax tampil data ================ -->

                    <!-- ================ batas awal ajax tampil data ================ -->
                    <div class="form-group">

                        <label class="control-label col-md-3"></label>

                        <div class="col-md-9">
                            <!-- DIRECT CHAT PRIMARY -->
                            <div class="box box-primary direct-chat direct-chat-primary">
                                <div class="box-header with-border">
                                    <center><h3 class="box-title"><font color="black"><b>Data Buku</b></font></h3></center>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body" style="color: #000; padding-left: 10px; padding-bottom: 10px; padding-right: 10px;">

                                    <div id="tampildatabuku"> 
                                        <div class="row">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Judul Buku</label>
                                                    <div class="col-md-9">
                                                        <input name="judulBuku" placeholder="Judul Buku" class="form-control" type="text" disabled="disabled">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Penerbit</label>
                                                    <div class="col-md-9">
                                                        <input name="penerbitBuku" placeholder="Penerbit" class="form-control" type="text" disabled="disabled">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-body">
                                            <span id="showjumlahBuku" class="input-group-addon bg-green">Stok Buku</span>
                                        </div>
                                    </div>
                                    
                                </div><!-- /.box-body -->
                            </div><!--/.direct-chat -->

                        </div><!-- /.box-body -->               
                    </div>
                    <!-- ================ batas ajax tampil data ================ -->

                    <div class="form-group">
                        <label class="control-label col-xs-3"><font color="black">Kode Buku</font></label>
                        <div class="col-xs-4">
                            <input onkeyup="tampiljumlahbuku(this.value)" id="idBuku" name="idBuku" placeholder="Kode Buku" class="form-control" type="text">
                            <input type="text" hidden="hidden" name="jumlahBuku" id="jumlahBuku">
                            <input type="text" hidden="hidden" id="jumlahhiddenStokBuku">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3"><font color="black">Jumlah Pinjam</font></label>   
                        <div class="col-md-9">        
                            <input onkeyup="tampiljumlahpinjam(this.value)" id="jumlahPinjam" name="jumlahPinjam" placeholder="Jumlah Pinjam" class="form-control" type="text">
                            <input id="hiddenjumlahPinjam" name="hiddenjumlahPinjam" hidden="hidden" type="text">
                        </div>
                    </div>
                </div>

                <!-- ================ batas bawah ajax tampil data ================ -->

                <div class="form-group">
                    <label class="control-label col-md-3"><font color="black">Tanggal Peminjaman</font></label>
                    <div class="col-md-9">
                        <!-- <input name="dob" placeholder="yyyy-mm-dd" class="form-control" type="text"> -->
                        <!-- Date dd/mm/yyyy -->
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <?php
                            date_default_timezone_set('Asia/Jakarta');
                            $tanggal= mktime(date("m"),date("d"),date("Y"));
                            $tglsekarang = date("Y-m-d", $tanggal);
                            ?>
                            <input type="text" readonly="readonly" value="<?php echo $tglsekarang;?>" name="tanggalPeminjaman" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div><!-- /.input group -->
                    </div>
                </div>                       
                <div class="form-group">
                    <label class="control-label col-md-3"><font color="black">Tanggal Pengembalian </br><small>(20 hari setelah peminjaman)</small></font></label>
                    <div class="col-md-9">
                        <!-- <input name="dob" placeholder="yyyy-mm-dd" class="form-control" type="text"> -->
                        <!-- Date dd/mm/yyyy -->
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <?php
                            date_default_timezone_set('Asia/Jakarta');
                            $tanggal= mktime(date("m"),date("d"),date("Y"));
                            $tglsekarang = date("Y-m-d", $tanggal);
                            $tglnow = date("Y-m-d");
                            $tglkembali = date('Y-m-d',strtotime('+20 days',strtotime($tglnow)));
                            ?>
                            <input type="text" readonly="readonly" value="<?php echo $tglkembali;?>" name="tanggalPengembalian" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div><!-- /.input group -->
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer header bg-white">
        <button type="button" id="btnSave" onclick="save()" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->