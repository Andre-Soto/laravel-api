<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ip = request()->ip();
        Log::info('Consulta de ifomración de customers desde la ip:'.$ip);


        $customer = Customer::where('status', '=', 'A')->get();

        return response()->json($customer, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        /*Log::info('Consulta de customers', [
            'ip' => $request->ip()
        ])*/
        
        $ip = request()->ip();
        Log::info('Se guardo un customer desde la ip:'.$ip);

        $customer = new Customer;
        $customer->dni = $request->dni;
        $customer->id_reg = $request->id_reg;
        $customer->id_com = $request->id_com;
        $customer->email = $request->email;
        $customer->name = $request->name;
        $customer->last_name = $request->last_name;
        $customer->address = $request->address;
        $customer->save();
        $data = [
            'message' => 'The customer was create successfully',
            'Customer' => $customer
        ];

        return response()->json($data, 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {

       // dd($customer);

        //echo $customer->status;

        $ip = request()->ip();
        Log::info('Se consulto la información de un customer desde la ip:'.$ip);

        if ($customer->status === "A") {
            //echo $customer;
            $data = [
                'message' => 'Client details',
                'Customer' => $customer,
                'Region' => $customer->regions,
                'Commune' => $customer->communes
            ];
            return response()->json($data, 200);
        }else {
            return "El usuario esta eliminado o inactivo.";
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //

        $ip = request()->ip();
        Log::info('Se actualizo la información de un customer desde la ip:'.$ip);

        $customer->dni = $request->dni;
        $customer->id_reg = $request->id_reg;
        $customer->id_com = $request->id_com;
        $customer->email = $request->email;
        $customer->name = $request->name;
        $customer->last_name = $request->last_name;
        $customer->address = $request->address;
        $customer->save();
        $data = [
            'message' => 'The customer was updated successfully',
            'Customer' => $customer
        ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //

        $ip = request()->ip();
        Log::info('Se elimino la un customer desde la ip:'.$ip);

        if($customer->status === "A" || $customer->status === "I"){
            $customer->status = "trash";
            $customer->save();
            $data = [
                'message' => "The customer was deleted successfully",
                'Customer' => $customer
            ];
    
            return response()->json($data, 200);
        }else{
            return "Registro no existe";
        }
        

    }
}
