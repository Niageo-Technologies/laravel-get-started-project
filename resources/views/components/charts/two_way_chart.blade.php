<script>
    [
        'data' => 'lossed_points_hand'
        'columns' => [
            ['type' => 'string', 'name' => 'hand']
            ['type' => 'number', 'name' => 'Number of Poins won']
        ]
        'column_2' => 'Number of points'
        'data' => 'lossed_points'
        'data' => 'lossed_points'
    ]
function drawChart() {

    // Create the data table.
    var {{ $data }} = new google.visualization.DataTable();
    
    @foreach($columns as $column)
        {{ $data }}.addColumn('{{ $column["type"] }}', '{{ $column["name"] }}');
    @endforeach

    {{ $data }}.addRows([
       @foreach ($values as $value)
            [$value['label'], $value['value']]
       @endforeach
    ]);




    var {{ $data }}options = {'tittle':'Winning shots Played to',
                   'width':400,
                   'height':300};

    // Instantiate and draw our chart, passing in some options.
    var {{ $chart_name }} = new google.visualization.PieChart(document.getElementById('chart_div'));
    {{ $chart_name }}.draw({{ $data }}, {{ $data }}options);
  }