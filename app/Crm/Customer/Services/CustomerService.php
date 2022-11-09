<?php

namespace Crm\Customer\Services;
use App\Crm\customer\Models\Customer;
use App\Crm\Customer\Repositories\CustomerRepository;
use Crm\customer\Events\CustomerCreation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CustomerService
{
    private CustomerRepository $customerRepository;
    public function __construct(CustomerRepository $customerRepository){
        $this->customerRepository = $customerRepository;
    }
    public function index (Request $request){
        return $this->customerRepository->all();
    }


    public function show(int $id){
        return Customer::find($id) ;
    }

    public function create(string $name): Customer
    {
        $customer = new Customer();
        $customer->name = $name;
        $customer->save();
        event(new CustomerCreation($customer));
        return $customer;
    }


    public function update (Request $request, int $id){
        $customer = Customer::find($id);
        if(!$customer){
            return response()->json(['status'=>'Not found'], ResponseAlias::HTTP_NOT_FOUND);
        }
        $customer->name = $request->get('name');
        $customer->save();
        return $customer;
    }


    public function delete (Request $request, int $id){
        $customer = Customer::find( $id);
        if(!$customer){
            return response()->json(['status'=>'Not found'], ResponseAlias::HTTP_NOT_FOUND);
        }
        $customer->delete();
        return response()->json(['status'=>'Deleted'],Response::HTTP_OK);

    }

}
