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

  Scenario: Successful selling two non-overlapping vouchers to a member
    When I sell voucher to him with data
      | startDate |  endDate | price   | maxAmount |
      |   -1 hour | +3 weeks | 125 PLN |        10 |
      |   +1 month| +2 month | 100 PLN |        10 |
    Then he has 2 vouchers
    And first voucher is his currentVoucher
    And I get notification about successful voucher creation.

#  Scenario: Error after adding two overlapping vouchers
#    When I sell voucher to him with data
#      | startDate |  endDate | price   | maxAmount |
#      |   -1 hour | +3 weeks | 125 PLN |        10 |
#      |   +1 week | +2 month | 100 PLN |        10 |
#
#  Scenario: Successful selling two overlapping vouchers to a member after closing first one
#    When I sell voucher to him with data
#      | startDate |  endDate | price   | maxAmount |
#      |   -1 week | +3 weeks | 125 PLN |        10 |
#    And I close current voucher with date 'now'
#    And I sell voucher to him with data
#      | startDate |  endDate | price   | maxAmount |
#      |   +1 minute| +2 month | 100 PLN |        10 |
#    Then he has 2 vouchers
#    And second voucher is his currentVoucher
#    And I get notification about successful voucher creation.
#
