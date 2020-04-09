<?php

namespace App\Http\Controllers;

use App\Listitem;
use Illuminate\Http\Request;

class ListItemController extends Controller
{
    public function changeorder(Request $request)
    {
        $order = $request->order;
        Listitem::setNewOrder($order);
    }
}
