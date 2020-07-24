<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Taxyinfo;


class TaxyinfoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allRecords()
    {
        $Taxilist = Taxyinfo::get()->toJson(JSON_PRETTY_PRINT);
        return response($Taxilist, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createRecord(Request $request)
    {
        $Taxiinfo = new Taxyinfo;
        $Taxiinfo->plat_no  = $request->plat_no;
        $Taxiinfo->model    = $request->model;
        $Taxiinfo->brand    = $request->brand;
        $Taxiinfo->type    = $request->type;
        $Taxiinfo->area    = $request->area;
        $Taxiinfo->status    = $request->status;
        $Taxiinfo->save();
        return response()->json([
            "message" => " Taxi Information record created"
        ], 201);


    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function oneRecord($id)
    {
        if (Taxyinfo::where('id', $id)->exists()) {
            $Taxiinfo = Taxyinfo::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($Taxiinfo, 200);
        } else {
            return response()->json([
            "message" => "Taxy Information not found"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRecord(Request $request, $id)
    {
        if (Taxyinfo::where('id', $id)->exists()) {
            $Taxiinfo = Taxyinfo::find($id);
            $Taxiinfo->plat_no = is_null($request->plat_no) ? $Taxiinfo->plat_no : $request->plat_no;
            $Taxiinfo->model = is_null($request->model) ? $Taxiinfo->model : $request->model;
            $Taxiinfo->brand = is_null($request->brand) ? $Taxiinfo->brand : $request->brand;
            $Taxiinfo->type = is_null($request->type) ? $Taxiinfo->type : $request->type;
            $Taxiinfo->area = is_null($request->area) ? $Taxiinfo->area : $request->area;
            $Taxiinfo->status = is_null($request->status) ? $Taxiinfo->status : $request->status;
            $Taxiinfo->save();
            return response()->json([
                "message" => "Taxy record updated successfully"
            ], 200);
            } else {
                 return response()->json([
                "message" => "Taxi Information reocrd not found"
                ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteRecord($id)
    {
        if(Taxyinfo::where('id', $id)->exists()) {
            $Taxiinfo = Taxyinfo::find($id);
            $Taxiinfo->delete();

            return response()->json([
              "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
            "message" => "Taxy informatino record not found"
            ], 404);
        }
    }
}
