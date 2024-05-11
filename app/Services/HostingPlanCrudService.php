<?php
namespace App\Services;

use App\Models\WebHosting;


class HostingPlanCrudService{
    public function storeService($plan_name, $plan_price,$storage,$data_transfer,$server_type,$no_of_websites,$panel_type,$ssl_type,$backup_policy,$no_of_email_accounts,$no_of_sub_domains,$no_of_databases,$sequence){
           
     
        WebHosting::create([
            'plan_name' => $plan_name,
            'plan_price' => $plan_price,
            'storage' => $storage,
            'data_transfer' => $data_transfer,
            'server_type' => $server_type,
            'no_of_websites' => $no_of_websites,
            'panel_type' => $panel_type,
            'ssl_type' => $ssl_type,
            'backup_policy' => $backup_policy,
            'no_of_email_accounts' => $no_of_email_accounts,
            'no_of_sub_domains' => $no_of_sub_domains,
            'no_of_databases' => $no_of_databases,
            'sequence' => $sequence
          ]);

    }

   
}


?>