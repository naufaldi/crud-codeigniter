
<script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.js');?>"></script>
<script src="<?=base_url('assets/plugins/jquery-slimscroll/jquery.slimscroll.js');?>"></script>
<script src="<?=base_url('assets/plugins/bootstrap-notify/bootstrap-notify.js');?>"></script>
<script src="<?=base_url('assets/plugins/node-waves/waves.js');?>"></script>
<script src="<?=base_url('assets/plugins/jquery-countto/jquery.countTo.js');?>"></script>
<script src="<?=base_url('assets/plugins/raphael/raphael.min.js');?>"></script>
<script src="<?=base_url('assets/plugins/morrisjs/morris.js');?>"></script>
<script src="<?=base_url('assets/plugins/chartjs/Chart.bundle.js');?>"></script>    
<script src="<?=base_url('assets/plugins/flot-charts/jquery.flot.js');?>"></script>
<script src="<?=base_url('assets/plugins/flot-charts/jquery.flot.resize.js');?>"></script>
<script src="<?=base_url('assets/plugins/flot-charts/jquery.flot.pie.js');?>"></script>
<script src="<?=base_url('assets/plugins/flot-charts/jquery.flot.categories.js');?>"></script>
<script src="<?=base_url('assets/plugins/flot-charts/jquery.flot.time.js');?>"></script>
<script src="<?=base_url('assets/plugins/jquery-sparkline/jquery.sparkline.js');?>"></script>
<script src="<?=base_url('assets/plugins/jquery-slimscroll/jquery.slimscroll.js');?>"></script>

<script src="<?=base_url('assets/plugins/jquery-validation/jquery.validate.js')?>"></script>
<script src="<?=base_url('assets/js/pages/examples/sign-in.js')?>"></script>



<script src="<?=base_url('assets/js/admin.js');?>"></script>
<script src="<?=base_url('assets/js/modals.js');?>"></script>
<script src="<?=base_url('assets/js/pages/ui/notifications.js');?>"></script>
<script src="<?=base_url('assets/js/pages/index.js');?>"></script>

<script src="<?=base_url('assets/js/demo.js');?>"></script>

<!-- data table -->
<script type="text/javascript" src="<?php echo base_url('assets/plugins/datatable/jquery.dataTables.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/datatable/dataTables.material.min.js')?>"></script>
<script>
  var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
  var lineChartData = {
    labels : ["January","February","March","April","May","June","July"],
    datasets : [
    {
      label: "My First dataset",
      fillColor : "rgba(99,129,143,0.2)",
      strokeColor : "rgba(99,129,143,1)",
      pointColor : "rgba(99,129,143,1)",
      pointStrokeColor : "#fff",
      pointHighlightFill : "#fff",
      pointHighlightStroke : "rgba(99,129,143,1)",
      data : [24,37,52,45,68,72,85]
    },
    {
      label: "My Second dataset",
      fillColor : "rgba(150,203,0,0.2)",
      strokeColor : "rgba(150,203,0,1)",
      pointColor : "rgba(150,203,0,1)",
      pointStrokeColor : "#fff",
      pointHighlightFill : "#fff",
      pointHighlightStroke : "rgba(150,203,0,1)",
      data : [31,42,58,35,60,80,95]
    }
    ]
  }

  var doughnutData = [
  {
    value: 42,
    color:"#00b8d4",
    label: "New"
  },
  {
    value: 58,
    color:"#ff8f00",
    label: "Returning"
  }

  ];

  var barChartData1 = {
    labels : ["2010","2011","2012","2013","2014","2015"],
    datasets : [
    {
      fillColor : "rgba(255,255,255,0.5)",
      strokeColor : "rgba(255,255,255,0.8)",
      highlightFill : "rgba(255,255,255,0.75)",
      highlightStroke : "rgba(255,255,255,1)",
      data : [380,900,1600,2300,4000,4800]
    }
    ]

  }
  var barChartData2 = {
    labels : ["1","2","3","4","5","6"],
    datasets : [
    {
      fillColor : "rgba(255,255,255,0.5)",
      strokeColor : "rgba(255,255,255,0.8)",
      highlightFill : "rgba(255,255,255,0.75)",
      highlightStroke : "rgba(255,255,255,1)",
      data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
    }
    ]

  }
  var barChartData3 = {
    labels : ["1","2","3","4","5","6"],
    datasets : [
    {
      fillColor : "rgba(255,255,255,0.5)",
      strokeColor : "rgba(255,255,255,0.8)",
      highlightFill : "rgba(255,255,255,0.75)",
      highlightStroke : "rgba(255,255,255,1)",
      data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
    }
    ]

  }
  var barChartData4 = {
    labels : ["1","2","3","4","5","6"],
    datasets : [
    {
      fillColor : "rgba(255,255,255,0.5)",
      strokeColor : "rgba(255,255,255,0.8)",
      highlightFill : "rgba(255,255,255,0.75)",
      highlightStroke : "rgba(255,255,255,1)",
      data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
    }
    ]

  }

  window.onload = function(){

    /* Prepare gallery items to work with Materialbox */
    $( "#gallery .material-placeholder" ).wrap( "<div></div>" );
    /* Initialize gallery */
    $('#gallery').justifiedGallery({
      lastRow : 'justify',
      margins : 5
    });

    /* Hide Preloader */
    $('.preloader-wrapper').css({ display: "none" });

    /* Fade to page */
    $('.stage').velocity({ opacity: 0 }, 1000, function() {
      $('body').removeClass('loading');
    });

    /* Display Graphs and Counting with delay */
    setTimeout(function() {
      var ctx1 = document.getElementById("graph-lined").getContext("2d");
      window.myLine = new Chart(ctx1).Line(lineChartData, {responsive: true});

      var ctx2 = document.getElementById("graph-doughnut").getContext("2d");
      window.myDoughnut = new Chart(ctx2).Doughnut(doughnutData, {responsive : true});

      var ctxB1 = document.getElementById("graph-bar1").getContext("2d");
      window.myBar1 = new Chart(ctxB1).Bar(barChartData1, {responsive : true, animation: false, showScale: false, scaleShowLabels: false, barValueSpacing : 3, barShowStroke : false, scaleShowGridLines : false});

      var ctxB2 = document.getElementById("graph-bar2").getContext("2d");
      window.myBar2 = new Chart(ctxB2).Bar(barChartData2, {responsive : true, animation: false, showScale: false, scaleShowLabels: false, barValueSpacing : 3, barShowStroke : false, scaleShowGridLines : false});

      var ctxB3 = document.getElementById("graph-bar3").getContext("2d");
      window.myBar3 = new Chart(ctxB3).Bar(barChartData3, {responsive : true, animation: false, showScale: false, scaleShowLabels: false, barValueSpacing : 3, barShowStroke : false, scaleShowGridLines : false});

      var ctxB4 = document.getElementById("graph-bar4").getContext("2d");
      window.myBar4 = new Chart(ctxB4).Bar(barChartData4, {responsive : true, animation: false, showScale: false, scaleShowLabels: false, barValueSpacing : 3, barShowStroke : false, scaleShowGridLines : false});

      $('.countup').countTo();
    }, 200);

  }

  //function Denny
  function reloadJs(idJs, ext) {
    if (ext=="min") {
      src = "<?php echo base_url('assets/plugins/js/bin/')?>"+idJs+".min.js";
    }else{
      src = "<?php echo base_url('assets/plugins/js/bin/')?>"+idJs+".js";
    }
    $('#'+idJs).remove();
    $('<script/>').attr({
      "src": src,
      'id': idJs
    }).appendTo('body');
  }

  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 112, // Creates a dropdown of 15 years to control year
    format: "yyyy-mm-dd"
  });

</script>
<script type="text/javascript">
  function logout() {
    swal({
      title: "Logout",
      text: "Apakah anda yakin ingin keluar dari SI Pesantren?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: '#26CA17',
      confirmButtonText: 'OK',
      cancelButtonText: "Batal",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm){
      if (isConfirm) {
      window.location="<?php echo base_url();?>FunctLogin/logout"; // if you need redirect page
      swal("Berhasil :(", "Anda Berhasil Logout!", "success");
    } else {
      swal("Batal :)", "Logout dibatalkan!", "error");
    }
  });
  }
</script>
</body>
</html>