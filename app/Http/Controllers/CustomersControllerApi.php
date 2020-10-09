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
                $response = $client->request('GET', $request, [
                    'headers'  => [
                        'token' => $this->token
                    ]
                ]);
            }
             catch (RequestException $e)
              {
                echo Psr7\str($e->getRequest());

                if ($e->hasResponse()) {
                    $body = $e->getResponse()->getBody();
                    $customers = (new Collection([]))->paginate(25);
                    session()->flash('success', json_decode($body)->message);
                    return view('adminpanel.layouts.index')
                    ->with(compact('customers'));
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
        $request = $this->domain.'/api/customersapi';

        $client = new Client();
        try {
                $response = $client->request('POST', $request, [
                    'headers'  => [
                        'token' => $this->token
                    ],
                    'form_params' => [
                        'new_customer_name' => $r->new_customer_name,
                        'new_customer_adress' => $r->new_customer_adress,
                        'new_customer_gender' => $r->new_customer_gender,
                        'new_customer_age' => (int)$r->new_customer_age
                    ]
                ]);
            }
             catch (RequestException $e)
              {
                echo Psr7\str($e->getRequest());

                if ($e->hasResponse()) {
                    $body = $e->getResponse()->getBody();
                    session()->flash('success', json_decode($body)->message);
                    return redirect()->back();
                }
            }
        $json = $response->getBody();
        $data = json_decode($json)->message;

        session()->flash('success', $data);

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
    public function edit($customer_id)
    {	
        $request = $this->domain.'/api/customersapi/'.$customer_id.'/edit';

        $client = new Client();
        try {
                $response = $client->request('GET', $request, [
                    'headers'  => [
                        'token' => $this->token
                    ]
                ]);
            }
             catch (RequestException $e)
              {
                echo Psr7\str($e->getRequest());

                if ($e->hasResponse()) {
                    $body = $e->getResponse()->getBody();
                    session()->flash('success', json_decode($body)->message);
                    return redirect()->route('customers.index');
                }
            }

        $json = $response->getBody();
        $customer = json_decode($json)->message;

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
    public function update(Request $r, $customer)
    {
       $request = $this->domain.'/api/customersapi/'.$customer;

        $client = new Client();
        try {
                $response = $client->request('PUT', $request, [
                    'headers'  => [
                        'token' => $this->token
                    ],
                    'form_params' => [
                        'name' => $r->name,
                        'adress' => $r->adress,
                        'gender' => $r->gender,
                        'age' => (int)$r->age
                    ]
                ]);
            }
             catch (RequestException $e)
              {
                echo Psr7\str($e->getRequest());

                if ($e->hasResponse()) {
                    $body = $e->getResponse()->getBody();
                    session()->flash('success', json_decode($body)->message);
                    return redirect()->route('customers.index');
                }
            }

        $json = $response->getBody();
        $message = json_decode($json)->message;
        session()->flash('success', $message);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy($customer)
    {
        $request = $this->domain.'/api/customersapi/'.$customer;

        $client = new Client();
        try {
                $response = $client->request('DELETE', $request, [
                    'headers'  => [
                        'token' => $this->token
                    ]
                ]);
            }
             catch (RequestException $e)
              {
                echo Psr7\str($e->getRequest());

                if ($e->hasResponse()) {
                    $body = $e->getResponse()->getBody();
                    session()->flash('success', json_decode($body)->message);
                    return redirect()->route('customers.index');
                }
            }

        $json = $response->getBody();
        $customer = json_decode($json)->message;

        session()->flash('success', 'Użytkownik usunięty');

        return redirect()->back();
    }
}
