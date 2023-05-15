<?php

namespace App\Services;

use App\Mail\ApplicationMail;
use App\Models\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ApplicationService
{

    /**
     * @param array $data
     * @param $imgReceipt
     * @param array $request
     * @return Application
     */
    public function store(array $data, $imgReceipt, array $request): Application
    {
        DB::beginTransaction();

        try {
            $application = new Application($data);

            if( $imgReceipt ) {
                $application->img_receipt = $imgReceipt->store('receipts');
            }

            $application->iban = Str::replace(' ', '', $request['iban']);
            $application->legal_1 = array_key_exists('legal_1', $request);
            $application->legal_2 = array_key_exists('legal_2', $request);
            $application->legal_3 = array_key_exists('legal_3', $request);
            $application->legal_4 = array_key_exists('legal_4', $request);
            $application->voivodeship_id = $request['voivodeship'];

            $application->save();

            DB::commit();

            return $application;
        } catch (Exception $e) {
            DB::rollBack();

            throw new Exception('Nie można zapisać zgłoszenia');
        }
    }

    /**
     * @param string $email
     * @param int $id
     * @return void
     */
    public function sendApplicationMail(string $email, int $id): void
    {
        Mail::to($email)->send(new ApplicationMail(['id' => $id]));
    }
}
