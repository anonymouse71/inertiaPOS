<?php
namespace Page\Acceptance;

class CustomersPage
{
    // include url of current page
    public static $URL = '/customers';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */
    public static $formFields = [
        'company_name' => 'company_name',
        'name'         => 'name',
        'phone'        => 'phone',
        'email'        => 'email',
        'address'      => 'address',
        'courier'      => 'courier',
        'submit'       => 'Save',
    ];
    /**
     * @var \AcceptanceTester;
     */
    protected $acceptanceTester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }

    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: Page\Edit::route('/123-post');
     */
    public static function route($param)
    {
        return static::$URL . $param;
    }
}
