@extends('admin.layouts.admin')

@section('title', "Create Game")

@section('content')
<div class="row">
    <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Points</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="{{ route('admin.points.store') }}" method="post">
                @csrf
                <input type="hidden" name="game_id" value="{{ $game->id }}">
                <button type="submit">Add Point</button>
            </form>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Ball Number</th>
                <th>Length</th>
                <th>Spin Amount</th>
                <th>Spin Type</th>
                <th>Using</th>
                <th>Stroke Type</th>
                <th>From</th>
                <th>To</th>
                <th>Toss</th>
                <th>Winner</th>

              </tr>
              </thead>
                  
              
              <tbody>

                @foreach($game->points as $point)
                    <tr>

                            <td  colspan="10">
                                @forelse ($point->balls as $ball)
                                    <tr 
                                    @if($ball->own_shot && $ball->winner) 
                                        style=" background-color: #009688; font-weight: 900" 
                                    @elseif($ball->own_shot == false && $ball->winner == true)  
                                        style=" background-color: #f44336; font-weight: 900" 
                                        @else 
                                    style=" background-color: #9e9e9e"  @endif>
                                        <td>

                                            {{ $ball->ball_position }}</td>
                                        <td>{{ $ball->length }}</td>
                                        <td>{{ config('app.table_tennis_spin_intensity_values')[$ball->spin_intensity] }}</td>
                                        <td>{{ config('app.table_tennis_spin_type_values')[$ball->spin] }}</td>
                                        <td>{{ config('app.hand_values')[$ball->hand] }}</td>
                                        <td>{{ config('app.table_tennis_stroke_values')[$ball->stroke_type] }}</td>
                                        <td>{{ config('app.table_tennis_placements_values')[$ball->from] }}</td>
                                        <td>{{ config('app.table_tennis_placements_values')[$ball->to] }}</td>
                                        <td>{{ config('app.table_tennis_toss_values')[$ball->toss] }}</td>
                                        <td >
                                            @if ($ball->own_shot)
                                            <i class="fas fa-arrow-up 3x" style="font-size:45px"></i>

                                            @else
                                            <i class="fas fa-arrow-down 3x" style="font-size:45px"></i>

                                        @endif
                                        
                                        </td>
                                        {{-- <td>{{ $ball->spin_intensity }}</td>       --}}
                              
                                    </tr>
                                    <tr>
                                        <td colspan="10">
                                            {{-- @include('admin.inc.create_ball')  --}}
                                        </td>
                                    </tr>
                                    

                            @empty 
                        
                                <tr>  
                                  <td colspan="10">
                                      @include('admin.inc.create_ball')     
                                  </td>    
                                </tr> 
                            @endforelse
                            @isset( $ball)
                            @if ( $ball->winner != 1 )
                        
                            <tr>  
                                <td colspan="10">
                                @include('admin.inc.create_ball')     
                            </td>    
                            </tr> 
                            @endif
                            @endisset

                            {{--for each ball  --}}
                                </td>
                            </tr>
                   

                @endforeach 
                </tbody>
            </table>
                {{-- Each point --}}
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->


      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Add Point</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

                    
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
  </div>
  <!-- /.row -->
@endsection