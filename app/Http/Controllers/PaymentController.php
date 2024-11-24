<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $req)
    {

        // Validasyon kuralları
        $validator = Validator::make($req->all(), [
            'reservation_id' => 'required|exists:reservations,id',
            'amount' => 'required|numeric|min:0.01',
        ], [
            // Özelleştirilmiş hata mesajları
            'reservation_id.required' => 'Rezervasyon ID gereklidir.',
            'reservation_id.exists' => 'Geçerli bir rezervasyon ID giriniz.',
            'amount.required' => 'Tutar bilgisi gereklidir.',
            'amount.numeric' => 'Tutar sayısal bir değer olmalıdır.',
            'amount.min' => 'Tutar en az 0.01 olmalıdır.',
        ]);

        // Validasyon başarısız ise hataları döndür
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422); // HTTP 422: Unprocessable Entity
        }
 
        $payment = new Payment();
        $payment->reservation_id = $req->reservation_id;
        $payment->amount = $req->amount;
        $payment->status = 1;

        $payment->save(); 


        //Core SQL versiyonu 
/*         
        DB::insert("
        INSERT INTO payments (reservation_id, amount, status, created_at, updated_at)
        VALUES (?, ?, ?, ?, ?)
        ", [
            $req->reservation_id,
            $req->amount,
            1, // status
            now(), // created_at
            now()  // updated_at
        ]); 
*/

        return response()->json([
            'status' => 'success',
            'message' => 'Ödeme işlemi başarılı.'
        ],200);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
