<?php

namespace App\Http\Controllers;

use App\Actions\DeleteMedia;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.service.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.service.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image_url' => 'required'
        ]);
        $inputs = $request->all();
        $manager = new ImageManager(new Driver());
        try {

            if (!empty($request->file('image_url'))) {
                $imagefile = $request->file('image_url');
                $myImage = $manager->read($imagefile->getPathname());
                $storagePath = 'service/' . uniqid();
                $filename = uniqid() . '.webp';
                $fullStoragePath = storage_path('app/public/' . $storagePath);
                if (!file_exists($fullStoragePath)) {
                    mkdir($fullStoragePath, 0755, true);
                }
                $myImage->toWebp(85)->save($fullStoragePath . '/' . $filename);
                $publicUrl = $storagePath . '/' . $filename;

                $inputs['image_url'] = $publicUrl;
                Service::create([
                    'name' => $inputs['name'],
                    'price' => $inputs['price'],
                    'description' => $inputs['description'],
                    'image_url' => $inputs['image_url']
                ]);

                return redirect()->back()->with("success", "Append Record Success !");
            }
        } catch (Exception $e) {
            Log::error('error on create service' . $e->getMessage());
            return redirect()->back()->with("error", "Check requirments error on validation !");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $record = Service::find($id);

        return view('dashboard.service.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        $inputs = $request->all();
        info($inputs);
        $manager = new ImageManager(new Driver());

        try {
            $record = Service::find($id);
            if (!$record)
                return redirect()->back()->with("error", "Check requirments error on validation !");
            if (!empty($request->file('image_url'))) {
                DeleteMedia::execute($record->image_url);
                $imagefile = $request->file('image_url');
                $myImage = $manager->read($imagefile->getPathname());
                $storagePath = 'service/' . uniqid();
                $filename = uniqid() . '.webp';
                $fullStoragePath = storage_path('app/public/' . $storagePath);
                if (!file_exists($fullStoragePath)) {
                    mkdir($fullStoragePath, 0755, true);
                }
                $myImage->toWebp(85)->save($fullStoragePath . '/' . $filename);
                $publicUrl = $storagePath . '/' . $filename;

                $inputs['image_url'] = $publicUrl;
            }
            $record->update([
                'name' => $inputs['name'],
                'price' => $inputs['price'],
                'description' => $inputs['description'],
                'image_url' => $inputs['image_url'] ?? $record->image_url
            ]);
            return redirect()->back()->with("success", "Update Record Success !");
        } catch (Exception $e) {
            Log::error('error on update service' . $e->getMessage());
            return redirect()->back()->with("error", "Check requirments error on validation !");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
