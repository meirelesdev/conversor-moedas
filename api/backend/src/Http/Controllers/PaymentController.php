<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Domain\UseCases\Payment\CreatePaymentType;
use App\Domain\UseCases\Payment\GetAllPaymentTypes;
use App\Http\Controller;

class PaymentController extends Controller
{
    protected $paymentsRepository;
    public function __construct($request, $container)
    {
        parent::__construct($request, $container);
        $this->paymentsRepository = $this->container['GetPaymentRepository']();
    }
    public function index()
    {
        try{
            $createConversion = new GetAllPaymentTypes($this->paymentsRepository);
            $payments = $createConversion->execute();
            $this->response(["status" => "sucesso", "data" => $payments], 200);
        }catch(\Exception $e){
            $arrayResponse['code'] = 'error';
            $arrayResponse['message'] = $e->getMessage();
            $this->response($arrayResponse);
        }
    }
    public function store()
    {
        try{
            $data = $this->request->getBody();
            $createPayment = new CreatePaymentType($data, $this->paymentsRepository);
            $payment = $createPayment->execute();
            $arrayResponse['code'] = 'sucesso';
            $arrayResponse['message'] = 'Pagamento salvo com sucesso.';
            $arrayResponse['data'] = $payment->toArray();
            $this->response($arrayResponse);
        } catch(\Exception $e){
            $arrayResponse['code'] = 'error';
            $arrayResponse['message'] = $e->getMessage();
            $this->response($arrayResponse);
        }
    }
}