<?php

namespace App\Console\Commands;

use App\Http\Controllers\Admin\CategoryController;
use App\Models\CashType;
use App\Models\Client;
use App\Models\Commision;
use App\Models\ContactInfo;
use App\Models\NetworkSeting;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CommissionCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'commission:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $today = Carbon::now()->toDateString();
        $last_day = Carbon::now()->previous(1);
        $commissions = Commision::where('date','=',$today)->get();
        $douple_attributes = array();
        $single_attributes = array();
        foreach ($commissions as $commission){
            $usercode = $commission->client_code_to;
            $count = 0;
            foreach ($commissions as $commission){
                if($commission->client_code_to == $usercode){
                    $count++;
                }
            }
            if($count == 1){
                array_push($single_attributes,$usercode);
            }
            elseif ($count == 2){
                if(!in_array($usercode,$douple_attributes)){
                    array_push($douple_attributes,$usercode);
                }
            }
        }
        foreach ($single_attributes as $single){
            $client = Client::all()->where('code_count','=',$single)->first();
            $main_data = NetworkSeting::all()->first();
            $client->emoney += $main_data->binary_commission;
            $client->exitcom_left_old = $client->exitcom_left;
            $client->exitcom_right_old = $client->exitcom_right;
            $client->exitcom_left -= 3;
            $client->exitcom_right -= 3;
            $client->save();
            $this->register_binary_income($client,$main_data);
        }
        foreach ($douple_attributes as $douple){
            $client = Client::all()->where('code_count','=',$douple)->first();
            $main_data = NetworkSeting::all()->first();
            $client->emoney += $main_data->binary_commission*2;
            $client->exitcom_left_old = $client->exitcom_left;
            $client->exitcom_right_old = $client->exitcom_right;
            $client->exitcom_left = 0;
            $client->exitcom_right = 0;
            $client->save();
            $this->register_binary_income($client,$main_data);
            $this->register_binary_income($client,$main_data);
        }
    }

    public function register_binary_income($client,$main_data){
        $wallet = new CashType();
        $wallet->client_sender = -1;
        $wallet->customer_id = $client->id;
        $wallet->type = "post";
        $wallet->comtiontype = 'Binary Income';
        $wallet->cash_money = $main_data->binary_commission ;
        $wallet->save();
    }
}
