<?php

namespace App\Http\Controllers;


use App\Models\Province;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function getReport(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length");
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');
        $columnIndex = $columnIndex_arr[0]['column'];
        $columnName = $columnName_arr[$columnIndex]['data'];
        $columnSortOrder = $order_arr[0]['dir'];
        $searchValue = $search_arr['value'];
        $totalRecords = Province::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Province::select('count(*) as allcount')->where('name', 'like', '%' . $searchValue . '%')->count();
        $params = [];
        $params['search'] = $searchValue;
        $params['orderBy'] = $columnName;
        $params['orderDir'] = $columnSortOrder;
        $records = Province::report()
            ->filter($params)
            ->skip($start)
            ->take($rowperpage)
            ->get()->toArray();
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $records
        );
        echo json_encode($response);
        exit;
    }
}
