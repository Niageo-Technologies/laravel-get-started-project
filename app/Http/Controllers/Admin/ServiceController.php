<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Exception;

class ServiceController extends Controller
{
    public function __construct()
    {
        parent::__construct('service');
    }

    public function index()
    {
        $data['services'] = Service::latest()->paginate(10);
        return view('admin.service.index', $data);
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(ServiceRequest $request)
    {
        try{
            $service = Service::create($request->all());

            $notification = array(
                'message' => 'Service saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.services.index')->with($notification);

        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );

            return redirect()->route('admin.services.index')->with($notification);
        }
    }

    public function show(Service $service)
    {
        //
    }

    public function edit(Service $service)
    {
        $data['service'] = $service;
        return view('admin.service.edit', $data);
    }

    public function update(ServiceRequest $request, Service $service)
    {
        try {
            $service = $service->update($request->all());

            $notification = array(
                'message' => 'Service saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.services.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.services.index')->with($notification);
        }
    }

    public function destroy(Service $service)
    {
        try{
            Service::find($service->id)->delete();

            $notification = array(
                'message' => 'Service deleted successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.services.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.services.index')->with($notification);
        }
    }
}
