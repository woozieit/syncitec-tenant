<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\System\Account;
use App\Models\System\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class TenantController extends Controller
{
    protected $tenant;

    public function __construct(Tenant $tenant)
    {
        $this->tenant = $tenant;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = Tenant::with('account')->latest();

        $tenant_active = $this->tenant->status('active');
        $tenant_demo =  $this->tenant->status('demo');
        $tenant_inactive =  $this->tenant->status('inactive');
        $tenant_retired =  $this->tenant->status('retired');

        return Inertia::render('System/Tenant/Index', [
            'tenants' => $tenants->get(),
            'tenant_total' => $tenants->count(),
            'tenant_active' => $tenant_active,
            'tenant_inactive' => $tenant_inactive,
            'tenant_demo' => $tenant_demo,
            'tenant_retired' => $tenant_retired
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('System/Tenant/Create', [
            'accounts' => Account::getList()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'name_manager'  => 'required'
        ]);

        $input = $request->all();

        $input['created_by'] = Auth::guard('admin')->id();

        // Verificar si existe el subdominio
        $data = Tenant::where('subdomain', $request->subdomain)->latest()->first();

        if ( $data ) {
            $input['sede_id'] = $data->sede_id + 1;
        }

        // Subir su logo

        // Crearle un usuario admin


        Tenant::create( $input );

        //return redirect()->route('admin.tenants.index')->with('sucess', 'Registro creado con éxito');
        return Redirect::route('admin.tenants.index')->with('success', 'Registro creado con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $tenant)
    {
        return Inertia::render('System/Tenant/Show', [
            'tenant' => $tenant,
            'accounts' => Account::getList()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // Validación
        $request->validate([
            'name_manager'  => 'required'
        ]);

        $input = $request->all();

        $tenant = Tenant::find($id)->update($input);

        return Redirect::route('admin.tenants.index')->with('success', 'El registro se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
