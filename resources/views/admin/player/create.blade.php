@extends('admin.layouts.crud_form')
@section('action')
    {{ route('admin.players.store') }}
@endsection

@section('title', "Create Opponent")

        @section('fields')
                @component('components.forms.input', [
                    'name' => 'name', 
                    'type' => 'text',
                    'label' => 'Name',
                    'placeholder' => 'Opponent\'s Name', 
                    'col_classes' => ['col-sm-12']
                    ])
                @endcomponent

                @component('components.forms.input', [
                    'name' => 'bh_rubber', 
                    'type' => 'text',
                    'label' => 'Backhand Rubber',
                    'placeholder' => 'Opponent\'s Backhand Rubber', 
                    'col_classes' => ['col-sm-12', 'col-md-6']
                    ])
                @endcomponent

                @component('components.forms.input', [
                    'name' => 'fh_rubber', 
                    'type' => 'text',
                    'label' => 'Forehand Rubber',
                    'placeholder' => 'Opponent\'s Forehand Rubber', 
                    'col_classes' => ['col-sm-12', 'col-md-6']
                    ])
                @endcomponent

                @component('components.forms.input', [
                    'name' => 'playing_style', 
                    'type' => 'select',
                    'label' => 'Forehand Rubber',
                    'placeholder' => 'Opponent\'s Forehand Rubber', 
                    'col_classes' => ['col-sm-12', 'col-md-12'], 
                    'options' => [
                            ['value' =>'attacker', 'label' =>'Attacker' ],
                            ['value' =>'defender', 'label' =>'Defender' ],
                            ['value' =>'chopper', 'label' =>'Chopper' ],
                        ]
                    ])
                @endcomponent

                @component('components.forms.input', [
                    'name' => 'right_handed', 
                    'type' => 'boolean',
                    'label' => 'Right Handed',
                    'col_classes' => ['col-sm-12', 'col-md-12'], 
                    'default_value' => 1,

                    ])
                @endcomponent
        @endsection
    
