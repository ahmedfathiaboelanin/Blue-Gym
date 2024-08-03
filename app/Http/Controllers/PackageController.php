<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth','superadmin']);
    }
    public function index()
    {
        $packages = Package::paginate(5);
        return view('Dashboard.packages', compact('packages'));
    }
    public function create()
    {
        return view('Dashboard.package-create');
    }
    public function addPackage(Request $request){
        // dd($request->all());
        $request->validate([
            'title' => 'required | string | unique:packages',
            'price' => 'required | decimal:0,4',
            'old_price' => 'decimal:0,4',
            'description' => 'required | string',
            'start_date' => 'required | date',
            'end_date' => 'required | date | after:start_date',
            'months' => 'required | integer',
            'badge' => 'required | string | in:BASIC,HOT,NEW',
        ]);
        $package = new Package();
        $package->title = $request->title;
        $package->price = $request->price;
        $package->old_price = $request->old_price;
        $package->description = $request->description;
        $package->start_date = $request->start_date;
        $package->end_date = $request->end_date;
        $package->months = $request->months;
        $package->badge = $request->badge;
        $package->save();
        return redirect()->route('dashboard.packages')->with('success', 'Package created successfully');
    }
    public function editform($id)
    {
        $package = Package::find($id);
        if (!$package) {
            return redirect()->route('dashboard.packages')->with('error', 'Package not found');
        }
        return view('Dashboard.package-edit', compact('package'));
    }
    public function edit(Request $request, $id)
    {
        $request->validate([
            'title' => 'required | string',
            'price' => 'required | decimal:0,4',
            'old_price' => 'decimal:0,4',
            'description' => 'required | string',
            'start_date' => 'required | date',
            'end_date' => 'required | date | after:start_date',
            'months' => 'required | integer',
            'badge' => 'required | string | in:BASIC,HOT,NEW',
            'is_active' => 'required | boolean',
        ]);
        $package = Package::find($id);
        if (!$package) {
            return redirect()->route('dashboard.packages')->with('error', 'Package not found');
        }
        $package->title = $request->title;
        $package->price = $request->price;
        $package->old_price = $request->old_price;
        $package->description = $request->description;
        $package->start_date = $request->start_date;
        $package->end_date = $request->end_date;
        $package->months = $request->months;
        $package->badge = $request->badge;
        $package->is_active = $request->is_active;
        $package->save();
        return redirect()->route('dashboard.packages')->with('success', 'Package updated successfully');
    }

    public function delete($id)
    {
        $package = Package::find($id);
        if (!$package) {
            return redirect()->route('dashboard.packages')->with('error', 'Package not found');
        }
        $package->delete();
        return redirect()->route('dashboard.packages')->with('success', 'Package deleted successfully');
    }
}
