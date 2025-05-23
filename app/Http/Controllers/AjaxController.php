<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    // $('#customer_id').select2({
    //     width: '100%',
    //     placeholder: 'Select...',
    //     allowClear: true,
    //     ajax: {
    //         url: window.location.origin + '/dashboard/select-2-ajax',
    //         dataType: 'json',
    //         delay: 250,
    //         cache: true,
    //         data: function(params) {
    //             let company = $("#company :selected").val();
    //             return {
    //                 q: $.trim(params.term),
    //                 type: 'getCustomerByCompany',
    //                 data: {
    //                     company: company
    //                 },
    //             };
    //         },
    //         processResults: function(data) {
    //             return {
    //                 results: data
    //             };
    //         }
    //     }
    // })
    public function select2(Request $request)
    {
        if ($request->ajax()) {
            switch ($request->type) {
                case 'getAnimalCategories':
                    // $response = AnimalCategory::select('id', 'name')
                    //     ->where('name', 'like', "%{$request->q}%")
                    //     ->where('parent_id', 0)
                    //     ->whereIsActive(1)
                    //     ->orderBy('name')
                    //     // ->limit(10)
                    //     ->get()->map(function ($data) {
                    //         return [
                    //             'id' => $data->id,
                    //             'text' => $data->name,
                    //         ];
                    //     })->toArray();
                    break;
                default:
                    $response = [];
                    break;
            }
            $name = preg_split('/(?=[A-Z])/', str_replace('get', '', $request->type), -1, PREG_SPLIT_NO_EMPTY);
            $name = implode(' ', $name);
            // array_unshift($response, ['id' => ' ', 'text' => 'All '.$name]);

            return $response;
        }

        return abort(404);
    }
}
