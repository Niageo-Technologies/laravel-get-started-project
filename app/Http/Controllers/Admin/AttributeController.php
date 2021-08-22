<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use App\Models\Attribute;
use Exception;

class AttributeController extends Controller
{
    public function __construct()
    {
        parent::__construct('attribute');
    }

    public function index()
    {
        $data['attributes'] = Attribute::latest()->paginate(10);
        return view('admin.attribute.index', $data);
    }

    public function create()
    {
        return view('admin.attribute.create');
    }

    public function store(AttributeRequest $request)
    {
        try{
            $attribute = Attribute::create($request->all());

            $notification = array(
                'message' => 'Attribute saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.attributes.index')->with($notification);

        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );

            return redirect()->route('admin.attributes.index')->with($notification);
        }
    }

    public function show(Attribute $attribute)
    {
        //
    }

    public function edit(Attribute $attribute)
    {
        $data['attribute'] = $attribute;
        return view('admin.attribute.edit', $data);
    }

    public function update(AttributeRequest $request, Attribute $attribute)
    {
        try {
            $attribute = $attribute->update($request->all());

            $notification = array(
                'message' => 'Attribute saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.attributes.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.attributes.index')->with($notification);
        }
    }

    public function destroy(Attribute $attribute)
    {
        try{
            Attribute::find($attribute->id)->delete();

            $notification = array(
                'message' => 'Attribute deleted successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.attributes.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.attributes.index')->with($notification);
        }
    }
}
