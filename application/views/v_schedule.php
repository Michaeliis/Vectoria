
<link href='<?= base_url('assets/packages')?>/core/main.css' rel='stylesheet' />
<link href='<?= base_url('assets/packages')?>/daygrid/main.css' rel='stylesheet' />
<script src='<?= base_url('assets/packages')?>/core/main.js'></script>
<script src='<?= base_url('assets/packages')?>/interaction/main.js'></script>
<script src='<?= base_url('assets/packages')?>/daygrid/main.js'></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid' ],
      defaultDate: '<?= date("Y-m-d")?>',
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
          <?php foreach($schedule as $schedules){?>
        {
          title: '<?= $schedules->userName?>',
            url: "<?= base_url('active/transport/'). $schedules->transportId?>",
          start: '2019-04-01'
        },
          <?php } ?>
      ]
    });

    calendar.render();
  });

</script>
<title>Transport Detail</title>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Transport Detail</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Active Transport</span></li>
                <li><span>Detail</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>
    
    <!--Start Page -->
    <section class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-9">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </section>
    <!--End Page -->
    
    