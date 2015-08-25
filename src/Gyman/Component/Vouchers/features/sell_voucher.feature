Feature: Selling a voucher
  I sell voucher to an existing member
  And I store voucher in repository
  Then I'm noticed about success or an error

  Background:
    Given I'm logged in as administrator
    And member 'test_account@gyman' exists
    And he has 0 vouchers

  Scenario: Successful selling voucher to a member without vouchers
    When I sell voucher to him with data
    | startDate | endDate  | price   | maxAmount |
    |   now     | +1 month | 125 PLN |        10 |
    Then he has 1 vouchers
    And I get notification about successful voucher creation.

  Scenario: Successful selling voucher to a member with currently active voucher
    When I sell voucher to him with data
      | startDate |  endDate | price   | maxAmount |
      |       now | +1 month | 125 PLN |        10 |
      |   +1 week | +2 month | 100 PLN |        10 |
    Then he has 2 vouchers
    And his previous voucher is closed with 'endDate' equals to date '+1 week'
    And I get notification about successful voucher creation.