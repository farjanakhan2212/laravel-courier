<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard</title>
  <!-- Font Awesome -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
  />
  <!-- Ionicons -->
  <link
    rel="stylesheet"
    href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
  />
  <!-- jQvMap CSS -->
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jqvmap.min.css"
    rel="stylesheet"
  />
  <!-- FullCalendar CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css"
    rel="stylesheet"
  />
  <style>
    /* Custom styles */
    .custom-box-1 {
      background: #3c4b64 !important;
      color: white !important;
    }
    .custom-box-2 {
      background: #55618f !important;
      color: white !important;
    }
    .custom-box-3 {
      background: #7159c1 !important;
      color: white !important;
    }
    .custom-box-4 {
      background: #563d7c !important;
      color: white !important;
    }
    .small-box .inner h3,
    .small-box .inner p,
    .small-box-footer {
      color: white !important;
    }
    .todo-list .text {
      color: white !important;
    }
    .card {
      border-radius: 6px;
    }
  </style>
</head>
<body style="background: #2f3b53; color: white; font-family: Arial, sans-serif;">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid" style="padding: 20px;">
      <!-- Stat Boxes -->
      <div class="row" style="display: flex; gap: 20px; flex-wrap: wrap;">
        <div class="col-lg-3 col-6" style="flex: 1 1 22%;">
          <div class="small-box custom-box-1" style="padding: 20px; border-radius: 8px;">
            <div class="inner">
              <h3>150</h3>
              <p>New Orders</p>
            </div>
            <div class="icon" style="font-size: 40px; opacity: 0.5;">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer text-light" style="color: white; text-decoration:none;">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-6" style="flex: 1 1 22%;">
          <div class="small-box custom-box-2" style="padding: 20px; border-radius: 8px;">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>
              <p>Bounce Rate</p>
            </div>
            <div class="icon" style="font-size: 40px; opacity: 0.5;">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer text-light" style="color: white; text-decoration:none;">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-6" style="flex: 1 1 22%;">
          <div class="small-box custom-box-3" style="padding: 20px; border-radius: 8px;">
            <div class="inner">
              <h3>44</h3>
              <p>User Registrations</p>
            </div>
            <div class="icon" style="font-size: 40px; opacity: 0.5;">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer text-light" style="color: white; text-decoration:none;">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-6" style="flex: 1 1 22%;">
          <div class="small-box custom-box-4" style="padding: 20px; border-radius: 8px;">
            <div class="inner">
              <h3>65</h3>
              <p>Unique Visitors</p>
            </div>
            <div class="icon" style="font-size: 40px; opacity: 0.5;">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer text-light" style="color: white; text-decoration:none;">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Main Row: charts, chat, map, calendar -->
      <div class="row" style="display: flex; gap: 20px; margin-top: 30px; flex-wrap: wrap;">
        <!-- Left column -->
        <section class="col-lg-7 connectedSortable" style="flex: 1 1 65%;">
          <!-- Sales Charts -->
          <div class="card" style="background:#3c4b64; padding: 15px; margin-bottom: 20px;">
            <div class="card-header" style="display: flex; justify-content: space-between; align-items: center; color: white;">
              <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i> Sales
              </h3>
              <div class="card-tools">
                <ul class="nav nav-pills ml-auto" style="display:flex; gap: 10px; list-style:none; padding:0; margin:0;">
                  <li class="nav-item">
                    <a class="nav-link active" href="#revenue-chart" data-toggle="tab" style="color:white; cursor:pointer;">Area</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#sales-chart" data-toggle="tab" style="color:white; cursor:pointer;">Donut</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body" style="position: relative; height: 300px;">
              <div id="revenue-chart" class="chart tab-pane active" style="height:300px;">
                <canvas id="revenue-chart-canvas" height="300"></canvas>
              </div>
              <div id="sales-chart" class="chart tab-pane" style="height:300px; display:none;">
                <canvas id="sales-chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>

          <!-- Direct Chat -->
          <div class="card direct-chat direct-chat-primary" style="background:#55618f; margin-bottom: 20px;">
            <div class="card-header" style="color:white; display: flex; justify-content: space-between; align-items: center;">
              <h3 class="card-title">Direct Chat</h3>
              <div class="card-tools">
                <span class="badge badge-light" style="background: white; color: #55618f; padding: 5px 10px; border-radius: 10px;">3</span>
                <button type="button" class="btn btn-tool" title="Collapse"><i class="fas fa-minus" style="color:white;"></i></button>
                <button type="button" class="btn btn-tool" title="Toggle Chat"><i class="fas fa-comments" style="color:white;"></i></button>
                <button type="button" class="btn btn-tool" title="Remove"><i class="fas fa-times" style="color:white;"></i></button>
              </div>
            </div>
            <div class="card-body" style="height: 200px; overflow-y: auto; background:#465a87;">
              <div class="direct-chat-messages" style="color: white; padding: 10px;">
                <!-- Chat messages go here -->
                <p><strong>Admin:</strong> Hello, how can I help you?</p>
                <p><strong>User:</strong> I want to know about sales data.</p>
              </div>
            </div>
            <div class="card-footer" style="background:#55618f; padding: 10px;">
              <form>
                <div class="input-group" style="display: flex;">
                  <input
                    type="text"
                    name="message"
                    placeholder="Type Message..."
                    class="form-control"
                    style="flex-grow:1; padding: 8px; border-radius: 4px 0 0 4px; border:none;"
                  />
                  <span class="input-group-append">
                    <button
                      class="btn btn-light"
                      style="background: white; border-radius: 0 4px 4px 0; border:none;"
                      type="submit"
                    >
                      Send
                    </button>
                  </span>
                </div>
              </form>
            </div>
          </div>

          <!-- To-Do List -->
          <div class="card" style="background:#7159c1; padding: 15px;">
            <div class="card-header" style="color: white; margin-bottom: 10px;">
              <h3 class="card-title">
                <i class="ion ion-clipboard mr-1"></i> To Do List
              </h3>
            </div>
            <div class="card-body">
              <ul class="todo-list" data-widget="todo-list" style="list-style:none; padding-left: 0;">
                <li style="padding: 10px 0; border-bottom: 1px solid rgba(255,255,255,0.2);">
                  <input type="checkbox" /> Finish dashboard design
                </li>
                <li style="padding: 10px 0; border-bottom: 1px solid rgba(255,255,255,0.2);">
                  <input type="checkbox" /> Fix bugs in code
                </li>
              </ul>
            </div>
            <div class="card-footer clearfix" style="text-align: right;">
              <button
                class="btn btn-light"
                style="background: white; border: none; border-radius: 4px; padding: 8px 12px; cursor:pointer;"
              >
                <i class="fas fa-plus"></i> Add item
              </button>
            </div>
          </div>
        </section>

        <!-- Right column -->
        <section class="col-lg-5 connectedSortable" style="flex: 1 1 30%; display: flex; flex-direction: column; gap: 20px;">
          <!-- Visitors Map -->
          <div class="card" style="background:#3c4b64; color:white; padding: 15px; border-radius: 6px;">
            <div class="card-header" style="margin-bottom: 10px;">
              <h3 class="card-title">
                <i class="fas fa-map-marker-alt"></i> Visitors
              </h3>
            </div>
            <div class="card-body" style="height: 250px;">
              <div id="world-map" style="height: 100%;"></div>
            </div>
          </div>

          <!-- Sales Graph -->
          <div class="card" style="background:#55618f; color:white; padding: 15px; border-radius: 6px;">
            <div class="card-header" style="margin-bottom: 10px;">
              <h3 class="card-title">
                <i class="fas fa-th"></i> Sales Graph
              </h3>
            </div>
            <div class="card-body" style="min-height: 250px;">
              <canvas id="line-chart"></canvas>
            </div>
          </div>

          <!-- Calendar -->
          <div class="card" style="background:#7159c1; color:white; padding: 15px; border-radius: 6px;">
            <div class="card-header" style="margin-bottom: 10px;">
              <h3 class="card-title">
                <i class="far fa-calendar-alt"></i> Calendar
              </h3>
            </div>
            <div class="card-body">
              <div id="calendar" style="width: 100%;"></div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </section>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-knob/1.2.13/jquery.knob.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jquery.vmap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/maps/jquery.vmap.world.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>

  <script>
    $(function () {
      // Tabs for Sales charts
      $('a.nav-link').click(function (e) {
        e.preventDefault();
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
        const target = $(this).attr('href');
        $('.chart.tab-pane').hide();
        $(target).show();
      });

      // Revenue line chart
      new Chart($('#revenue-chart-canvas'), {
        type: 'line',
        data: {
          labels: ['Jan', 'Feb', 'Mar'],
          datasets: [
            {
              label: 'Sales',
              data: [30, 50, 40],
              backgroundColor: 'rgba(255,255,255,0.2)',
              borderColor: '#fff',
              fill: true,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            y: {
              beginAtZero: true,
              ticks: { color: 'white' },
              grid: { color: 'rgba(255,255,255,0.1)' },
            },
            x: {
              ticks: { color: 'white' },
              grid: { color: 'rgba(255,255,255,0.1)' },
            },
          },
          plugins: {
            legend: {
              labels: { color: 'white' },
            },
          },
        },
      });

      // Sales donut chart
      new Chart($('#sales-chart-canvas'), {
        type: 'doughnut',
        data: {
          labels: ['Complete', 'Pending', 'Cancel'],
          datasets: [
            {
              data: [60, 30, 10],
              backgroundColor: ['#28a745', '#ffc107', '#dc3545'],
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              labels: { color: 'white' },
            },
          },
        },
      });

      // jQuery Knob initialization
      $('.knob').knob();

      // Vector map
      $('#world-map').vectorMap({
        map: 'world_en',
        backgroundColor: 'transparent',
        regionStyle: {
          initial: {
            fill: '#ffffff',
            'fill-opacity': 0.6,
          },
        },
      });

      // FullCalendar initialization
      const calendarEl = document.getElementById('calendar');
      const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        themeSystem: 'standard',
      });
      calendar.render();
    });
  </script>
</body>
</html>
