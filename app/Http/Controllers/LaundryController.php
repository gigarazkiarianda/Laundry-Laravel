<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LaundryController extends Controller
{
    public function index()
    {
        $transactions = Laundry::all();
        return view('pages.laundry.index', compact('transactions'));
    }

    public function create()
    {
        return view('pages.laundry.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:pending,completed,canceled',
            'employee_id' => 'required|integer|exists:employees,id',
        ]);

        $laundry = new Laundry();
        $laundry->customer_name = $request->customer_name;
        $laundry->note_number = str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);
        $laundry->barcode = Str::uuid(); // Generate unique barcode
        $laundry->price = $request->price;
        $laundry->status = $request->status;
        $laundry->employee_id = $request->employee_id;
        $laundry->save();

        return redirect()->route('pages.laundry.index')->with('success', 'Laundry transaction created successfully.');
    }

    public function edit($id)
    {
        $laundry = Laundry::findOrFail($id);
        return view('pages.laundry.edit', compact('laundry'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:pending,completed,canceled',
            'employee_id' => 'required|integer|exists:employees,id',
        ]);

        $laundry = Laundry::findOrFail($id);
        $laundry->customer_name = $request->customer_name;
        $laundry->price = $request->price;
        $laundry->status = $request->status;
        $laundry->employee_id = $request->employee_id;
        $laundry->save();

        return redirect()->route('pages.laundry.index')->with('success', 'Laundry transaction updated successfully.');
    }

    public function destroy($id)
    {
        $laundry = Laundry::findOrFail($id);
        $laundry->delete();

        return redirect()->route('pages.laundry.index')->with('success', 'Laundry transaction deleted successfully.');
    }
}
