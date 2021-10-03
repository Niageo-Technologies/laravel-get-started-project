<?php

namespace App\Http\Controllers;

use App\Http\Traits\GlobalTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Point;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, GlobalTrait;

    public function __construct($permissionGroup = '', $isApi=0)
    {
        if($permissionGroup != ''){
            $listPermissions = ($isApi) ? ['index', 'search'] : ['index'];
            $this->middleware("permission:$permissionGroup list")->only($listPermissions);
            $this->middleware("permission:$permissionGroup create")->only(['create', 'store']);
            $this->middleware("permission:$permissionGroup view")->only('view');
            $this->middleware("permission:$permissionGroup edit")->only(['edit', 'update']);
            $this->middleware("permission:$permissionGroup delete")->only('destroy');
        }
    }

    public function fetch_options_from_database($model, $attribute, $secondary_attribute=0){   //to develop html options array given the Model
        $Collection = $model::all();
        $options = [];

        //dd('yep, I DID IT');
        foreach ($Collection as $item){       
            $temp = [];
            $temp['value'] = $item->id;
            if($secondary_attribute){
                $temp['label'] = $item->$attribute . " - " . $item->$secondary_attribute ;
            }else{
                $temp['label'] = $item->$attribute;
            }
            array_push($options, $temp);
        }

        return $options;
    }

    public const table_tennis_strokes = [
        ['value' =>'loop' ,'label'=>'Loop'],
        ['value' =>'counter_Loop' ,'label'=>'Counter Loop'],
        ['value' =>'drive' ,'label'=>'Drive'],
        ['value' =>'push' ,'label'=>'Push'],
        ['value' =>'block' ,'label'=>'Block'],
        ['value' =>'smash' ,'label'=>'Smash'],
        ['value' =>'chop' ,'label'=>'Chop'],
        ['value' =>'flick' ,'label'=>'Flick'],
        ['value' =>'banana Flick' ,'label'=>'Banana Flick',],
        ['value' =>'strawberry Flick','label'=>'Strawberry Flick'],
        ['value' =>'lob' ,'label' => 'Lob'],
    ];

    public static function winner(Point $point)
    {
        if(isset($point->balls->where('winner', true)[0])){
            $winning_ball = $point->balls->where('winner', true)[0];
            if($winning_ball->own_shot == true){
                return true;
            }
        }
       //dd($winning_ball->own_shot );

        return false;
    }

}
