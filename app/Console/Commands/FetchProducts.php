<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\Category;
use App\Models\Status;
use Illuminate\Support\Facades\Http;

class FetchProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $date = now('Asia/Jakarta')->format('d-m-y');
        $dateusername = now('Asia/Jakarta')->format('dmy');
        $hour = 'C' . now('Asia/Jakarta')->format('H');
        $password = md5("bisacoding-$date");
        $username = 'tesprogrammer' . $dateusername . $hour;

        $response = Http::asForm()
        ->post('https://recruitment.fastprint.co.id/tes/api_tes_programmer', [
            'username' => $username,
            'password' => $password,
        ]);


        if ($response->failed()) {
            dd('Request failed',
            $response->status(),
            $response->body()
        );
        }

        $data = $response->json('data');

        if (!is_array($data)) {
            dd('Data tidak valid', $response->json());
        }

        foreach ($data as $item) {
            $category = Category::firstOrCreate([
                'nama_kategori' => $item['kategori'],
            ]);

            $status = Status::firstOrCreate([
                'nama_status' => $item['status'],
            ]);

            Product::updateOrCreate(
                [
                    'nama_produk' => $item['nama_produk'],
                ],
                [
                    'harga' => $item['harga'],
                    'category_id' => $category->id,
                    'status_id' => $status->id,
                ]
            );
        }

        $this->info('Products berhasil di-fetch & disimpan');
    }
}
