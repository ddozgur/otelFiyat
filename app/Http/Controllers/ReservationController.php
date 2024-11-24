<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::with('hotel', 'user', 'payments')->get();
       

        //Core SQL versiyonu 
/*         
        $reservations = DB::select("
        SELECT 
            reservations.*, 
            hotels.*, 
            users.*, 
            payments.*
        FROM 
            reservations
        LEFT JOIN 
            hotels ON reservations.hotel_id = hotels.id
        LEFT JOIN 
            users ON reservations.user_id = users.id
        LEFT JOIN 
            payments ON reservations.id = payments.reservation_id
        "); 
*/

    
        return $reservations;
    

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {

        // Validasyon kuralları
        $validator = Validator::make($req->all(), [
            'hotel_id' => 'required|exists:hotels,id',
            'user_id' => 'required|exists:users,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'guest_count' => 'required|integer|min:1',
        ], [
            // Özelleştirilmiş hata mesajları
            'hotel_id.required' => 'Otel bilgisi gereklidir.',
            'hotel_id.exists' => 'Seçilen otel bulunamadı.',
            'user_id.required' => 'Kullanıcı bilgisi gereklidir.',
            'user_id.exists' => 'Seçilen kullanıcı bulunamadı.',
            'check_in.required' => 'Giriş tarihi gereklidir.',
            'check_in.date' => 'Giriş tarihi geçerli bir tarih formatında olmalıdır.',
            'check_in.after_or_equal' => 'Giriş tarihi bugünden önce olamaz.',
            'check_out.required' => 'Çıkış tarihi gereklidir.',
            'check_out.date' => 'Çıkış tarihi geçerli bir tarih formatında olmalıdır.',
            'check_out.after' => 'Çıkış tarihi, giriş tarihinden sonra olmalıdır.',
            'guest_count.required' => 'Misafir sayısı gereklidir.',
            'guest_count.integer' => 'Misafir sayısı bir tam sayı olmalıdır.',
            'guest_count.min' => 'Misafir sayısı en az 1 olmalıdır.',
        ]);

        // Validasyon başarısız ise hataları döndür
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422); // HTTP 422: Unprocessable Entity
        }

        // Rezervasyon kayıt
        $reservation = new Reservation();
        $reservation->hotel_id = $req->hotel_id;
        $reservation->user_id = $req->user_id;
        $reservation->check_in = $req->check_in;
        $reservation->check_out = $req->check_out;
        $reservation->guest_count = $req->guest_count;

        $reservation->save();

        //Core SQL versiyonu 

/*         
        DB::insert("
        INSERT INTO reservations (hotel_id, user_id, check_in, check_out, guest_count, created_at, updated_at)
        VALUES (?, ?, ?, ?, ?, ?, ?)
        ", [
            $req->hotel_id,
            $req->user_id,
            $req->check_in,
            $req->check_out,
            $req->guest_count,
            now(), // created_at
            now()  // updated_at
        ]); 
*/

        return response()->json([
            'status' => 'success',
            'message' => 'Rezervasyon oluşturuldu.'
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
