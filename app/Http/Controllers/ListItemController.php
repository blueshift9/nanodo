<?php

namespace App\Http\Controllers;

use App\Listitem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Mockery\Exception;

class ListItemController extends Controller
{
    public function changeorder(Request $request)
    {
        $order = $request->order;
        Listitem::setNewOrder($order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listitem $listitem)
    {
        \App\Listitem::destroy($listitem->id);

        return response('Great job!', 200);
    }
}
