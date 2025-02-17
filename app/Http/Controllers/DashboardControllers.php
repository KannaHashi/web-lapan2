<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Modis;

class DashboardControllers extends Controller
{
    function index()
    {
        return view('index', ['modis' => Modis::all()]);
    }

    function testing()
    {
        return view('testing', ['modis' => Modis::all()]);
    }

    function action(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('modis')
                    ->where('CustomerName', 'like', '%' . $query . '%')
                    ->orWhere('Address', 'like', '%' . $query . '%')
                    ->orWhere('City', 'like', '%' . $query . '%')
                    ->orWhere('PostalCode', 'like', '%' . $query . '%')
                    ->orWhere('Country', 'like', '%' . $query . '%')
                    ->orderBy('CustomerID', 'desc')
                    ->get();
            } else {
                $data = DB::table('modis')
                    ->orderBy('CustomerID', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
        <tr>
         <td>' . $row->CustomerName . '</td>
         <td>' . $row->Address . '</td>
         <td>' . $row->City . '</td>
         <td>' . $row->PostalCode . '</td>
         <td>' . $row->Country . '</td>
        </tr>
        ';
                }
            } else {
                $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }
}
