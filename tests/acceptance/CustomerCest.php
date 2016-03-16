<?php

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
}
