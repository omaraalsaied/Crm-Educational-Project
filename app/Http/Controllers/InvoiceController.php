<?php

namespace App\Http\Controllers;

use App\crm\customer\Models\Invoice;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class InvoiceController extends Controller
{
    // getting all the invoices
    public function index(Request $request){
        return Invoice::all();
    }

    // getting all the invoices for specific Customer
    public function customer_index(Request $request, $customer_id){
        return Invoice::Where('customer_id',$customer_id)->get();
    }

    // getting an invoice by id
    public function show($invoice_id){
        return Invoice::find($invoice_id) ??  response()->json(['status'=>'Not found'], ResponseAlias::HTTP_NOT_FOUND);
    }

    public function create(Request $request){
        $invoice = new Invoice();
            $invoice->total = $request->get('total');
            $invoice->items = $request->get('items');
            $invoice->status = $request->get('status');
            $invoice->customer_id = $request->get('customer_id');

        $invoice->save();
        return $invoice;
    }


    public function update (Request $request, $invoice_id){
        $invoice = Invoice::find($invoice_id);
        if(!$invoice){
            return response()->json(['status'=>'Not found'], ResponseAlias::HTTP_NOT_FOUND);
        }
        if($request->get('total')){
            $invoice->total = $request->get('total');
        }

        if($request->get('items')){
            $invoice->items = $request->get('items');
        }

        if($request->get('status')){
            $invoice->status = $request->get('status');
        }
        $invoice->save();
        return $invoice;
    }


    public function delete (Request $request, $invoice_id){
        $invoice = invoice::find($invoice_id);
        if(!$invoice){
            return response()->json(['status'=>'Not found'], ResponseAlias::HTTP_NOT_FOUND);
        }
        $invoice->delete();
        return response()->json(['status'=>'Deleted'],Response::HTTP_OK);

    }
}
