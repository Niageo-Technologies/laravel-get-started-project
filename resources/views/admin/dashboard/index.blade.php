@extends('admin.layouts.admin')
@section('title', "Dashboard")
    
@section('content')
    @php
        $chart_type = 'PieChart'
    @endphp
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['backhand', {{ $balls->where('own_shot', true)->where('winner', true)->where('hand', 'backhand')->count() }}],
          ['Forehand', {{ $balls->where('own_shot', true)->where('winner', true)->where('hand', 'forehand')->count() }}],

        ]);

        var lost_point_data = new google.visualization.DataTable();
        lost_point_data.addColumn('string', 'Played to');
        lost_point_data.addColumn('number', 'poistion');
        lost_point_data.addRows([
            @foreach(config('app.table_tennis_placements') as $placement)
                ['{{ $placement["label"] }}', {{ $balls->where('own_shot', true)->where('winner', true)->where('from', $placement['value'])->count() }}],
            @endforeach

        ]);

        var played_to_data = new google.visualization.DataTable();
        played_to_data.addColumn('string', 'Placement');
        played_to_data.addColumn('number', 'Positions');
        played_to_data.addRows([
            @foreach(config('app.table_tennis_stroke') as $placement)
                ['{{ $placement["label"] }}', {{ $balls->where('own_shot', true)->where('winner', true)->where('stroke_type', $placement['value'])->count() }}],
            @endforeach

        ]);

        // Set chart options
        var options = {'ittle':'Winning shots tool',
                       'width':400,
                       'height':300,
                       'pieHole': 0.4,

                    };

        var to_options = {'ittle':'Winning shots Played to',
                       'width':400,
                       'height':300,
                       'pieHole': 0.4,};

        var lost_to_options = {'ittle':'Points lost',
                       'width':400,
                       'height':300,
                       'pieHole': 0.4,};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.{{ $chart_type }}(document.getElementById('chart_div'));
        var chart2 = new google.visualization.{{ $chart_type }}(document.getElementById('shots_played_to'));
        var chart3 = new google.visualization.{{ $chart_type }}(document.getElementById('shots_lost_on'));
        chart.draw(data, options);
        chart2.draw(played_to_data, to_options);
        chart3.draw(lost_point_data, lost_to_options);


        // Create the data table.
        var winning_placements = new google.visualization.DataTable();
        winning_placements.addColumn('string', 'position');
        winning_placements.addColumn('number', 'value');
        winning_placements.addRows([
            @foreach(config('app.table_tennis_placements') as $placement)
                ['{{ $placement["label"] }}', {{ $balls->where('own_shot', true)->where('winner', true)->where('to', $placement['value'])->count() }}],
            @endforeach

        ]);
        // Set chart options
        var winning_placements_options = {'ittle':'Winning shots tool',
                       'width':400,
                       'height':300,
                       'pieHole': 0.4,};
// Instantiate and draw our chart, passing in some options.
        var winning_placements_chart = new google.visualization.{{ $chart_type }}(document.getElementById('winning_placements'));
        winning_placements_chart.draw(winning_placements, winning_placements_options);



        
                // Create the data table.
        var lost_to_shot = new google.visualization.DataTable();
                lost_to_shot.addColumn('string', 'position');
                lost_to_shot.addColumn('number', 'value');
                lost_to_shot.addRows([
            @foreach(config('app.table_tennis_stroke') as $placement)
                ['{{ $placement["label"] }}', {{ $balls->where('own_shot', false)->where('winner', true)->where('stroke_type', $placement['value'])->count() }}],
            @endforeach

        ]);
        // Set chart options
        var lost_to_shot_options = {'tittle':'Winning shots tool',
                       'width':400,
                       'height':300,
                       'pieHole': 0.4,};
// Instantiate and draw our chart, passing in some options.
        var lost_to_shot_chart = new google.visualization.{{ $chart_type }}(document.getElementById('lost_to_shot'));
        lost_to_shot_chart.draw(lost_to_shot, lost_to_shot_options);


    

    // Create the data table.
        var loss_positions = new google.visualization.DataTable();
        loss_positions.addColumn('string', 'position');
        loss_positions.addColumn('number', 'value');
        loss_positions.addRows([
            @foreach(config('app.table_tennis_placements') as $placement)
                ['{{ $placement["label"] }}', {{ $balls->where('own_shot', false)->where('winner', true)->where('to', $placement['value'])->count() }}],
            @endforeach

        ]);
        // Set chart options
        var loss_positions_options = {'tittle':'Winning shots tool',
                       'width':400,
                       'height':300,
                       'pieHole': 0.4,};
// Instantiate and draw our chart, passing in some options.
        var loss_positions_chart = new google.visualization.{{ $chart_type }}(document.getElementById('loss_positions'));
        loss_positions_chart.draw(loss_positions, lost_to_shot_options);



      }
    </script>
    <div class="row">
        <div class="col-sm-12">
            <br>
            <h2>All Points ({{ $points->count() }})</h2>
            <br>
        </div>
    </div>
<div class="row">
    <div class="col-sm-12">
        <br>
        <h2>Winning Points</h2>
        <br>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">USING</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <div id="chart_div"></div>
        
            </div>
            <!-- /.card-body -->
          </div>
    </div>
    
    
    <div class="col-md-3">
          
    <div class="card card-danger">
        <div class="card-header">
          <h3 class="card-title">STROKE</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            <div id="shots_played_to"></div>
    
        </div>
        <!-- /.card-body -->
      </div>
    </div>


    <div class="col-md-3">
          
        <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">FROM</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <div id="shots_lost_on"></div>
        
            </div>
            <!-- /.card-body -->
          </div>
        </div>

        

        
    <div class="col-md-3">
          
        <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">TO</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <div id="winning_placements"></div>
        
            </div>
            <!-- /.card-body -->
          </div>
        </div>
</div>

<div class="row">
    <h2>Losing Points Points</h2>
</div>
<div class="row">
    <div class="col-md-3">
          
        <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Incoming Placement</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <div id="loss_positions"></div>
        
            </div>
            <!-- /.card-body -->
          </div>
        </div>

        <div class="col-md-3">
          
            <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title">Icoming Strokes</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                    <div id="lost_to_shot"></div>
            
                </div>
                <!-- /.card-body -->
              </div>
            </div>
</div>
@endsection