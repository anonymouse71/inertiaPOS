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
        $I->fillField(CustomersPage::$formFields['name'], $customer->name);
        $I->fillField(CustomersPage::$formFields['phone'], $customer->phone);
        $I->fillField(CustomersPage::$formFields['email'], $customer->email);
        $I->fillField(CustomersPage::$formFields['address'], $customer->address);
        $I->fillField(CustomersPage::$formFields['courier'], $customer->courier);
        $I->click(CustomersPage::$formFields['submit']);

        $I->wait(5);
        $I->seeCurrentUrlEquals(CustomersPage::$URL);
        $I->see($customer->company_name, 'table');
        $I->see($customer->name, 'table');
        $I->see($customer->phone, 'table');
        $I->see($customer->address, 'table');
        $I->see($customer->courier, 'table');
    }
}
