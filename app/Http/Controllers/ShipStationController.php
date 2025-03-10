<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use LaravelShipStation;

class ShipStationController extends Controller
{
    public function index(Request $request)
    {
    	// $shipStation = new LaravelShipStation\ShipStation('3e462d03988941dca98f2f48c6e8ace8','adf2609fdcd3491980f0287cde4ff2c6','https://ssapi.shipstation.com','');
    	$shipStation = app(\LaravelShipStation\ShipStation::class);

    	$address = new LaravelShipStation\Models\Address();

	    $address->name = "Joe Campo";
	    $address->street1 = "123 Main St";
	    $address->city = "Cleveland";
	    $address->state = "OH";
	    $address->postalCode = "44127";
	    $address->country = "US";
	    $address->phone = "2165555555";

    	// return response()->json($address);
    	return response()->json($shipStation->isRateLimited());
	}

    public function create_order(Request $request)
    {
    	// $shipStation = new LaravelShipStation\ShipStation('3e462d03988941dca98f2f48c6e8ace8','adf2609fdcd3491980f0287cde4ff2c6','https://ssapi.shipstation.com','');
    	$shipStation = app(\LaravelShipStation\ShipStation::class);

    	$address = new LaravelShipStation\Models\Address();

	    $address->name = "Joe Campo";
	    $address->street1 = "123 Main St";
	    $address->city = "Cleveland";
	    $address->state = "OH";
	    $address->postalCode = "44127";
	    $address->country = "US";
	    $address->phone = "2165555555";

	    $item = new LaravelShipStation\Models\OrderItem();

	    $item->lineItemKey = '1';
	    $item->sku = '580123456';
	    $item->name = "Awesome sweater.";
	    $item->quantity = '1';
	    $item->unitPrice  = '29.99';
	    $item->warehouseLocation = 'Warehouse A';

	    $order = new LaravelShipStation\Models\Order();

	    $order->orderNumber = '1';
	    $order->orderDate = '2016-05-09';
	    $order->orderStatus = 'awaiting_shipment';
	    $order->amountPaid = '29.99';
	    $order->taxAmount = '0.00';
	    $order->shippingAmount = '0.00';
	    $order->internalNotes = 'A note about my order.';
	    $order->billTo = $address;
	    $order->shipTo = $address;
	    $order->items[] = $item;

	    // This will var_dump the newly created order, and order should be wrapped in an array.
	    // var_dump($shipStation->orders->post($order, 'createorder'));
	    return response()->json($shipStation->orders->post($order, 'createorder'));
    }


    public function getUSShippingRates($weightOz=30, $fromZip=07303, $toZip=99553)
    {
        $ss = app(\LaravelShipStation\ShipStation::class);
        // $weight = new Weight();
        // $weight->units = 'ounces';
        // $weight->value = $weightOz;
        $weight['units'] = 'ounces';
        $weight['value'] = $weightOz;
        $shipmentInfo = [
            'carrierCode' => 'stamps_com',
            'fromPostalCode' => $fromZip,
            'toCountry' => 'US',
            'toPostalCode' => $toZip,
            'weight' => $weight
        ];

        $rates = $ss->shipments->post(
            $shipmentInfo,
            'getrates'
        );

        // return json_encode($rates);
        return response()->json($rates);
    }
}
