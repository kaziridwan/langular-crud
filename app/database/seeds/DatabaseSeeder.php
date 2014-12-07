<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('AccountTypesTableSeeder');
       	$this->call('AccountsTableSeeder');
       	$this->call('SubCategoriesTableSeeder');
		$this->call('ProductsTableSeeder');
		$this->call('CustomersTableSeeder');
		$this->call('InvoicesTableSeeder');
		$this->call('InvoiceItemsTableSeeder');
        $this->call('RawMaterialsTableSeeder');
        $this->call('VendorsTableSeeder');
        $this->call('BillsTableSeeder');
        $this->call('BillingItemsTableSeeder');
        $this->call('BillPaymentsTableSeeder');
	}

}
