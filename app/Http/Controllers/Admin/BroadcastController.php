<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Broadcast;
use App\Models\Pelanggan;
use App\Models\User;
use App\Models\Satker;
use Illuminate\Support\Facades\Log;

class BroadcastController extends Controller
{
    public function index()
    {
        $data['list_broadcast'] = Broadcast::all();
        return view('admin.broadcast.index', $data);
    }


    public function create()
    {
        return view('admin.broadcast.create');
    }

    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'pesan' => 'required|string', // Pastikan pesan tidak kosong dan berupa string
        ]);

        // Ambil pesan dari form
        $pesan = $request->input('pesan');

        // Ambil semua pelanggan dari database
        $pelanggan = Pelanggan::all();

        // Buat array untuk menyimpan nomor telepon
        $phoneNumbers = [];

        // Loop melalui semua pelanggan
        // Loop melalui semua pelanggan
        foreach ($pelanggan as $pelanggan) {
            // Ambil nomor telepon pelanggan
            $phoneNumber = $pelanggan->no_hp;

            // Tambahkan nomor telepon ke array
            $phoneNumbers[] = $phoneNumber;

            // Kirim pesan WhatsApp
            $this->sendWhatsAppMessage($phoneNumber, $pesan);
        }

        $broadcast = new Broadcast();
        $broadcast->judul_pesan = request('judul_pesan');
        $broadcast->tanggal = now();
        $broadcast->pesan = request('pesan');
        $broadcast->save();

        return redirect('admin/broadcast')->with('success', 'Data Berhasil Ditambah');
    }

    public function sendWhatsAppMessage($phoneNumber, $message)
    {
        $token = "drUesCtgAo9UQcnqYUkv";
        $target = "$phoneNumber";

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' => $message,
                'delay' => '5-10',
            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: $token"
            ),
        ));

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
            Log::error('Error sending WhatsApp message: ' . $error_msg);
            // Tampilkan pesan error kepada pengguna atau lakukan tindakan lain sesuai kebutuhan aplikasi Anda
        }
        curl_close($curl);

        // Jika tidak ada kesalahan, tidak perlu melakukan apa pun karena pesan sudah berhasil dikirim

        return $response; // Mengembalikan respons dari API WhatsApp
    }

    function destroy($id)
    {
        $broadcast = Broadcast::find($id);
        $broadcast->delete();

        return back()->with('danger', 'Data Berhasil Dihapus');
    }
}
