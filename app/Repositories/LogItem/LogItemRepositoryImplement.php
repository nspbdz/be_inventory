<?php

namespace App\Repositories\LogItem;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\LogItem;
use App\Http\Helpers\ResponseHelpers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Carbon;


class LogItemRepositoryImplement extends Eloquent implements LogItemRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(LogItem $model)
    {
        $this->model = $model;
    }

    public function index($request)
    {
        return ResponseHelpers::sendSuccess('get Log items data', $this->model->all());
    }

    public function store($request)
    {
        // $data = LogItem::create([
        //     'action' => $request['action'],
        //     'item_id' => $request['item_id'],
        //     // 'user_id' => $request['user_id'],
        //     // 'action_date' => $request['action_date'],
        // ]);

        $data = [
            'action' => $request['action'],
            'item_id' => $request['item_id'],
        ];

        // $data = LogItem::create([
        //     'action' => $request['action'],
        //     'item_id' => $request['item_id'],
        //     'user_id' => 1,
        //     'action_date' => Carbon::now(),
        // ]);

        // $data = LogItem::create([
        //     'qr' => $request['qr'],
        // ]);

        // $data['qrcode'] = QrCode::generate('Welcome to Makitweb');
        // QrCode::format('png');
        // dd($data);

        // Store QR code for download
        // QrCode::generate('Welcome to Makitweb', public_path('images/qrcode.svg'));
        // QrCode::format('png')->generate(10, public_path('images/qrcodes.png'));

        $text = 'Welcome to Makitweb'; // Teks yang akan dijadikan QR code

        $qrCode = QrCode::format('png')->size(200)->generate($text);

        $imageName = 'qrcode.png'; // Nama file gambar QR code

        // Simpan gambar QR code ke folder public/img
        $qrCode->store(public_path('img'), $imageName);


        // return view('qrcode', ['imageName' => $imageName]);

        return ResponseHelpers::sendSuccess('Item created', $data);
    }

    public function show($id)
    {
        return ResponseHelpers::sendSuccess('get Item data', $this->model->find($id));
    }

    public function update($request, $id)
    {

        try {

            $this->model = $this->model->find($id);
            $this->model->name = $request->name ?? $this->model->name;
            $this->model->brand_id = $request->brand_id ?? $this->model->brand_id;
            $this->model->size = $request->size ?? $this->model->size;
            $this->model->color = $request->color ?? $this->model->color;
            $this->model->qty = $request->qty ?? $this->model->qty;
            $this->model->qr_code = $request->qr_code ?? $this->model->qr_code;
            $this->model->update();
        } catch (\Throwable $th) {
            throw $th;
        }


        return ResponseHelpers::sendSuccess('Item updated', $this->model);
    }

    public function destroy($id)
    {
        $this->model = $this->model->find($id);
        $this->model->delete();

        return ResponseHelpers::sendSuccess('Item deleted', $this->model);
    }


    // Write something awesome :)
}
