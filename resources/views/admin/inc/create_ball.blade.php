                                       
                                       @if (session('message'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('message') }}
                                            </div>
                                        @endif

                                    <form method="POST" action=" {{ route('admin.balls.store')}}" >
                                        @csrf
                                        <div class="row">
                                        <input type="hidden" name="point_id" value="{{ $point->id }}">
                                        
                                        @component('components.forms.input', [
                                            'name' => 'ball_position', 
                                            'type' => 'number',
                                            'label' => 'Point Position',
                                            'placeholder' => 'what number point in the game was this', 
                                            'col_classes' => ['col-sm-12', 'col-md-1'], 
                                            'default_value' =>  $point->balls->count() 
                                        ])
                                        @endcomponent

                                        
                                        @component('components.forms.input', 
                                        [
                                            'name' => 'hand', 
                                            'type' => 'select',
                                            'label' => 'Using',
                                            'placeholder' => 'Forehand or backhand', 
                                            'col_classes' => ['col-sm-12', 'col-md-1'], 
                                            'options' => [
                                                    ['value' =>'forehand', 'label' =>'Forehand' ],
                                                    ['value' =>'backhand', 'label' =>'Backhand' ],
                                                ]
                                        ])
                                        @endcomponent

                                        @component('components.forms.input', [
                                            'name' => 'stroke_type', 
                                            'type' => 'select',
                                            'label' => 'Stroke type',
                                            'placeholder' => 'Type of stroke utilized', 
                                            'col_classes' => ['col-sm-12', 'col-md-1'], 
                                            'options' => $strokes                                        ])
                                        @endcomponent


                                        @component('components.forms.input', [
                                            'name' => 'length', 
                                            'type' => 'select',
                                            'label' => 'Length',
                                            'placeholder' => 'Balls length on table', 
                                            'col_classes' => ['col-sm-12', 'col-md-1'], 
                                            'options' => [
                                                    ['value' =>'Short', 'label' =>'Short' ],
                                                    ['value' =>'half_long', 'label' =>'Half Long' ],
                                                    ['value' =>'Long', 'label' =>'Long' ],
                                                ]
                                        ])
                                        @endcomponent
                                        @component('components.forms.input', [
                                            'name' => 'spin_intensity', 
                                            'type' => 'select',
                                            'label' => 'Spin Intensity',
                                            'placeholder' => 'How spinny was this shot', 
                                            'col_classes' => ['col-sm-12', 'col-md-1'], 
                                            'options' => config('app.table_tennis_spin_intensity')
                                        ])
                                        @endcomponent

                                        {{-- Spin Type --}}
                                        @component('components.forms.input', [
                                            'name' => 'spin', 
                                            'type' => 'select',
                                            'label' => 'Spin Type',
                                            'placeholder' => 'Type of spin', 
                                            'col_classes' => ['col-sm-12', 'col-md-1'], 
                                            'options' => config('app.table_tennis_spin_type')
                                        ])
                                        @endcomponent



                                        @component('components.forms.input', [
                                            'name' => 'from', 
                                            'type' => 'select',
                                            'label' => 'From',
                                            'placeholder' => 'This shot was played froms', 
                                            'col_classes' => ['col-sm-12', 'col-md-1'], 
                                            'options' =>  Config('app.table_tennis_placements'),
                                        ])
                                        @endcomponent
                                        @component('components.forms.input', [
                                            'name' => 'to', 
                                            'type' => 'select',
                                            'label' => 'TO',
                                            'placeholder' => 'This shot was played to', 
                                            'col_classes' => ['col-sm-12', 'col-md-1'], 
                                            'options' =>  Config('app.table_tennis_placements'),
                                        ])
                                        @endcomponent

                                        @component('components.forms.input', [
                                            'name' => 'toss', 
                                            'type' => 'select',
                                            'label' => 'Toss',
                                            'placeholder' => 'Height of Toss', 
                                            'col_classes' => ['col-sm-12', 'col-md-1'], 
                                            'options' =>  Config('app.table_tennis_tosses'),
                                        ])
                                        @endcomponent

                                        @component('components.forms.input', [
                                            'name' => 'winner', 
                                            'type' => 'select',
                                            'label' => 'Winner',
                                            'placeholder' => 'This ball won the point', 
                                            'col_classes' => ['col-sm-12', 'col-md-1'], 
                                            'options' => [
                                                    ['value' =>'0', 'label' =>'NO' ],
                                                    ['value' =>'1', 'label' =>'YES' ],
                                        ], 
                                        ])
                                        @endcomponent

                                        
                                        @component('components.forms.input', [
                                            'name' => 'own_shot', 
                                            'type' => 'select',
                                            'label' => 'Own Shot',
                                            'placeholder' => 'This ball won the point', 
                                            'col_classes' => ['col-sm-12', 'col-md-1'],
                                            'options' => [
                                                    ['value' =>'0', 'label' =>'NO' ],
                                                    ['value' =>'1', 'label' =>'YES' ],
                                        ], 
                                            'default_value' => 0
                                        ])
                                        @endcomponent
 

                                    </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="form-group">
                                                    <a class="btn btn-danger mr-1" href='{{ route("admin.sets.index") }}' type="submit">Cancel</a>
                                                    <button class="btn btn-success" type="submit">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>