@extends('admin.layouts.crud_form')
@section('action')
    {{ route('admin.games.store') }}
@endsection

@section('title', "Create Game")

@section('fields')


@component('components.forms.input', [
    'name' => 'set_id', 
    'type' => 'select',
    'label' => 'Set',
    'placeholder' => 'Select Set', 
    'col_classes' => ['col-sm-12', 'col-md-12'], 
    'options' => $options
    ])
@endcomponent

@component('components.forms.input', [
    'name' => 'time_out', 
    'type' => 'boolean',
    'label' => 'Time out used',
    'placeholder' => '',
    'default_value'=> 1, 
    'col_classes' => ['col-sm-12', 'col-md-12'], 

    ])
@endcomponent

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