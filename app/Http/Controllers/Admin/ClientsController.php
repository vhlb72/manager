<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreClientsRequest;
use App\Http\Requests\Admin\UpdateClientsRequest;


class ClientsController extends Controller
{
    /**
     * Display a listing of Client.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('client_access')) {
            return abort(401);
        }



       $permissions = Permission::all();
       
       $clients = Client::all();

        //return view('admin.clients.index', compact('clients'));
        return view('admin.clients.index', compact('clients','$permissions'));
        

    }

    /**
     * Show the form for creating new Client.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('client_create')) {
            return abort(401);
        }
        
        $client_statuses = \App\ClientStatus::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.clients.create', compact('client_statuses'));
    }

    /**
     * Store a newly created Client in storage.
     *
     * @param  \App\Http\Requests\StoreClientsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientsRequest $request)
    {
     
        if (! Gate::allows('client_access')) {
            return abort(401);
        }
     
        $client = Client::create($request->all());



        return redirect()->route('admin.clients.index');
    }


    /**
     * Show the form for editing Client.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        if (! Gate::allows('client_edit')) {
            return abort(401);
        }

        

        
        $client_statuses = \App\ClientStatus::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $client = Client::findOrFail($id);

        return view('admin.clients.edit', compact('client', 'client_statuses'));
    }

    /**
     * Update Client in storage.
     *
     * @param  \App\Http\Requests\UpdateClientsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientsRequest $request, $id)
    {
        
        $client = Client::findOrFail($id);
        $client->update($request->all());



        return redirect()->route('admin.clients.index');
    }


    /**
     * Display Client.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
        
        $client_statuses = \App\ClientStatus::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');$client_projects = \App\ClientProject::where('client_id', $id)->get();

        $client = Client::findOrFail($id);

        return view('admin.clients.show', compact('client', 'client_projects'));
    }


    /**
     * Remove Client from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('admin.clients.index');
    }

    /**
     * Delete all selected Client at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
    
        if ($request->input('ids')) {
            $entries = Client::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
