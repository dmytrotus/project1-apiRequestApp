<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use App\Support\Collection;

class CustomersControllerApi extends Controller
{
    
    protected $domain = 'http://127.0.0.1:7777';
    protected $token = 'ffsdf3c34t34t3';

    public function index(Request $r)
    {   
        
        $request = $this->domain.'/api/customersapi';

        $client = new Client();
        try {
                $response = $client->request('GET', $request);
            }
             catch (RequestException $e)
              {
                echo Psr7\str($e->getRequest());

                if ($e->hasResponse()) {

                    echo Psr7\str($e->getResponse());
                }
            }
        $json = $response->getBody();
        $data = json_decode($json)->message;
        $customers = (new Collection($data))->paginate(25);


        return view('adminpanel.layouts.index')
        ->with(compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        ///store customer
        session()->flash('success', 'Użytkownik dodany');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(Customers $customers)
    {
        return redirect()->route('customers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit(Customers $customer)
    {	
    	//get customer
        return view('adminpanel.layouts.single_customer')
        ->with(compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Customers $customer)
    {
       
       ///update customer
        session()->flash('success', 'Użytkownik zaktualizowany');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customers $customer)
    {
        //destroy customer
        session()->flash('success', 'Użytkownik usunięty');

        return redirect()->back();
    }
}
