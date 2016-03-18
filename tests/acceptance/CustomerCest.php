<?php

use App\Models\Customer;
use App\Models\Person;
use Page\Acceptance\CustomersPage;

class CustomerCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function test_can_see_a_list_of_customers(AcceptanceTester $I)
    {
        $I->am('registered employee');
        $I->wantTo('see a list of customers on the customers index page');
        $I->expectTo('see a list of customers being displayed in the datatable');

        $I->amOnPage(CustomersPage::$URL);

        $I->wait(5); // wait for table to load
        $I->see('Example Company 1', 'table'); // company name
        $I->see('Example Customer 1', 'table'); // name
        $I->see('1234567890', 'table'); // phone
        $I->see('1 Example Street, Surabaya, Indonesia', 'table'); // address
        $I->see('Example Courier 1', 'table'); // courier
    }

    public function test_can_create_customer(AcceptanceTester $I)
    {
        $person = factory(Person::class)->make();
        $customer = factory(Customer::class)->make([
            'person_id' => $person->id,
        ]);

        $I->am('registered employee');
        $I->wantTo('create a new customer');
        $I->expectTo('be able to save a new customer and see the newly created customer');

        $I->amOnPage(CustomersPage::route('/create'));

        $I->fillField(CustomersPage::$formFields['company_name'], $customer->company_name);
        $I->fillField(CustomersPage::$formFields['name'], $person->name);
        $I->fillField(CustomersPage::$formFields['phone'], $person->phone);
        $I->fillField(CustomersPage::$formFields['email'], $person->email);
        $I->fillField(CustomersPage::$formFields['address'], $person->address);
        $I->fillField(CustomersPage::$formFields['courier'], $customer->courier);
        $I->click(CustomersPage::$formFields['submit']);

        $I->wait(5);
        $I->seeCurrentUrlEquals(CustomersPage::$URL);
        $I->see($customer->company_name);
        $I->see($person->name);
        $I->see($person->phone);
        $I->see($customer->courier);
    }

    public function test_can_edit_customer(AcceptanceTester $I)
    {
        $customer = factory(Customer::class)->create();
        $newData = new \StdClass();
        $newData->name = 'My New Name';
        $newData->courier = 'The New Courier';

        $I->am('registered employee');
        $I->wantTo('edit an existing customer');
        $I->expectTo('be able to edit an existing customer\'s data');

        $I->amOnPage(CustomersPage::route("/$customer->id/edit"));

        $I->see($customer->company_name);
        $I->see($customer->courier);
        $I->see($customer->name);
        $I->see($customer->phone);
        $I->see($customer->email);
        $I->see($customer->address);

        $I->fillField(CustomersPage::$formFields['name'], $newData->name);
        $I->fillField(CustomersPage::$formFields['courier'], $newData->courier);
        $I->click('Save');

        $I->wait(5);
        $I->seeCurrentUrlEquals(CustomersPage::$URL);
        $I->see($customer->company_name);
        $I->see($newData->name);
        $I->see($newData->courier);
        $I->see($customer->phone);
        $I->see($customer->email);
    }
}
