<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Lib;

class LibController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Main';
        $fields = \Schema::getColumnListing('libs');
        $lib = Lib::all();
        return view('lib.index')
            ->with('title', $title)
            ->with('fields', $fields)
            ->with('lib', $lib);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lib.form', ['title' => 'Add Library']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:15',
            'language' => 'required|max:15',
            'star' => 'required|numeric'
        ]);

        $lib = new Lib;

        $lib->title = $request->title;
        $lib->language = $request->language;
        $lib->star = $request->star;

        $lib->save();

        return redirect('lib');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fields = \Schema::getColumnListing('libs');
        $lib = Lib::find($id);
        return view('lib.show')
            ->with('fields', $fields)
            ->with('lib', $lib);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id !== '')
        {
            $title = 'Edit Library';
            $lib = Lib::find($id);

            return view('lib.form')
                ->with('title', $title)
                ->with('lib', $lib);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:15',
            'language' => 'required|max:15',
            'star' => 'required|numeric'
        ]);

        $lib = Lib::find($id);

        $lib->title = $request->title;
        $lib->language = $request->language;
        $lib->star = $request->star;

        $lib->save();

        Session::flash('message', 'Success Update Lib!');
        return redirect('lib');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lib = Lib::find($id);
        $lib->delete();
        Session::flash('message', 'Success Delete Lib!');
        return redirect('lib');
    }
}
