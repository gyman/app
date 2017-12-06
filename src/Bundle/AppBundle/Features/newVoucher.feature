Feature: New voucher modal popup
    In order to add voucher
    As a navigator
    I need to open voucher modal

Scenario: A list contain members
  Given I am on "http://bjj.local/"
   When I click element "table#membersList tr:first-child a.newVoucher"
   Then I will wait to see "Nowy karnet"