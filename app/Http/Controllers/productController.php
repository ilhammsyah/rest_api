<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = DB::select(
            '
                SELECT a.kodeprod, a.kode_prc, a.namaprod, a.namainvoice, a.supp, a.grupprod, a.isisatuan, a.odrunit,
                a.grup1, a.grup2, a.grup, a.subgroup, a.berat, a.volume, a.active, a.produksi, a.report, a.permen,
                a.besar, a.sedang, a.kecil, a.qty1, a.qty2, a.qty3, a.ed_before, a.ed_after, a.moq,
                b.h_dp, b.h_bsp, b.h_pbf, b.d_dp, b.d_bsp, b.d_pbf
                FROM mpm.tabprod a LEFT JOIN
                (
                        SELECT pd.*
                        FROM mpm.prod_detail pd
                        INNER JOIN (
                                        SELECT kodeprod, MAX(tgl) as max_tanggal
                                        FROM mpm.prod_detail
                                        GROUP BY kodeprod
                        ) latest ON pd.kodeprod = latest.kodeprod AND pd.tgl = latest.max_tanggal
                )b on a.KODEPROD = b.kodeprod
            '
        );

        return response()->json([
            'status' => true,
            'message'=> 'data ditemukan',
            'data' => $product
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
