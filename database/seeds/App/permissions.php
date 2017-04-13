<?php

use App\Permission; //+
use Illuminate\Database\Seeder;



class permissions extends Seeder
{
    public function run()
    {
        $createInvoice  =new Permission();
        $createInvoice ->name ='create-invoice';
        $createInvoice ->display_name ='Create Invoice'; //optional
        $createInvoice ->description ='create new Invoice';
        $createInvoice ->save();

        $editInvoice  =new Permission();
        $editInvoice ->name ='edit-invoice';
        $editInvoice ->display_name ='Edit Invoice'; //optional
        $editInvoice ->description ='Edit existing invoice';
        $editInvoice ->save();

        $deleteInvoice  =new Permission();
        $deleteInvoice ->name ='delete-invoice';
        $deleteInvoice ->display_name ='Delete Invoice'; //optional
        $deleteInvoice ->description ='Delete existing invoice';
        $deleteInvoice ->save();
    }
}
