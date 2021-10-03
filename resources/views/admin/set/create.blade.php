@extends('admin.layouts.crud_form')
@section('action')
    {{ route('admin.sets.store') }}
@endsection

@section('title', "Create Set")

@section('fields')
    @component('components.forms.input', [
        'name' => 'opponent_id', 
        'type' => 'select',
        'label' => 'Opponent',
        'placeholder' => 'Select Opponent', 
        'col_classes' => ['col-sm-12'], 
        'options' => $options,
        ])
    @endcomponent

    @component('components.forms.input', [
        'name' => 'date', 
        'type' => 'date',
        'label' => 'Date',
        'placeholder' => 'Match Date', 
        'col_classes' => ['col-sm-12'], 
        ])
    @endcomponent

    @component('components.forms.input', [
        'name' => 'table_type', 
        'type' => 'select',
        'label' => 'Table Type',
        'placeholder' => 'Brand', 
        'col_classes' => ['col-sm-12'], 
        'options' => [
                ['value'=> 'stag', 'label' => 'Stag'],
                ['value'=> 'butterfly', 'label' => 'Butterfly'],
                ['value'=> 'donic', 'label' => 'Donic'],
                ['value'=> 'Tihbar', 'label' => 'Tihbar'],

            ]
        ])
    @endcomponent

    @component('components.forms.input', [
        'name' => 'tournament', 
        'type' => 'text',
        'label' => 'Tournament',
        'placeholder' => '', 
        'col_classes' => ['col-sm-12'], 
        ])
    @endcomponent

    
    @component('components.forms.input', [
        'name' => 'venue', 
        'type' => 'text',
        'label' => 'Venue',
        'placeholder' => 'where was matched played', 
        'col_classes' => ['col-sm-12'], 
        ])
    @endcomponent


    @component('components.forms.input', [
        'name' => 'fh_rubber', 
        'type' => 'text',
        'label' => 'forehand Rubber',
        'placeholder' => '', 
        'col_classes' => ['col-sm-12'], 
        ])
    @endcomponent

    @component('components.forms.input', [
        'name' => 'bh_rubber', 
        'type' => 'text',
        'label' => 'backhand Rubber',
        'placeholder' => '', 
        'col_classes' => ['col-sm-12'], 
        ])
    @endcomponent


@endsection

