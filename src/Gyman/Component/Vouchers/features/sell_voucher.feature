Feature: Selling a voucher
  I sell voucher to an existing member
  And I store voucher in repository
  Then I'm noticed about success or an error

  Scenario: Successful selling voucher to a member
    Given I'm logged in as administrator
    And member 'test_account@gyman' exists
    And he has no vouchers
