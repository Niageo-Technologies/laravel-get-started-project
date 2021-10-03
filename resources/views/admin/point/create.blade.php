@extends('admin.layouts.crud_form')
@section('action')
    {{ route('admin.points.store') }}
@endsection

@section('title', "Add Point")

@section('fields')
    @component('components.forms.input', [
        'name' => 'playing_style', 
        'type' => 'textarea-rich',
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
@endsection