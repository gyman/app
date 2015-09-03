Feature: Adding an entry for member
  If user exists and has active voucher
  That is of open type or has sufficient amount of free entries

  Background:
    Given I'm logged in as administrator
    And member 'test_account@gyman' exists
    And he has 0 vouchers

  Scenario: Successful adding a free entry to member without any voucher
    When member has no last entry
    And he has 0 entries
    And he has 0 vouchers
    And I add 'free' entry for him
    Then he should have 1 entry
    And he should have set last entry
    And I should be notified about the member entry success

  Scenario: Successful adding a free entry to member with voucher
    When member has no last entry
    And current voucher is added
    And his current voucher has 10 entries left
    And he has 0 entries
    And I add 'free' entry for him
    Then he should have 1 entry
    And he should have set last entry
    And his current voucher has 10 entries left
    And I should be notified about the member entry success

  Scenario: Successful adding a paid entry to user without any voucher
    When member has no last entry
    And he has 0 entries
    And he has 0 vouchers
    And I add 'paid' entry for him for '10 PLN'
    Then he should have 1 entry
    And he should have set last entry
    And I should be notified about the member entry success

  Scenario: Successful adding an paid entry to user with voucher
    When member has no last entry
    And current voucher is added
    And his current voucher has 10 entries left
    And he has 0 entries
    And I add 'paid' entry for him for '10 PLN'
    Then he should have 1 entry
    And he should have set last entry
    And his current voucher has 10 entries left
    And I should be notified about the member entry success

  Scenario: Successful adding an voucher entry to user with voucher
    When member has no last entry
    And current voucher is added
    And his current voucher has 10 entries left
    And he has 0 entries
    And I add 'voucher' entry for him
    Then he should have 1 entry
    And he should have set last entry
    And his current voucher has 9 entries left
    And I should be notified about the member entry success

  Scenario: Successful adding an voucher entry to user with unlimited voucher
    When member has no last entry
    And current voucher is added with unlimited entries
    And he has 0 entries
    And I add 'voucher' entry for him
    Then he should have 1 entry
    And he should have set last entry
    And his current voucher has unlimited entries left
    And I should be notified about the member entry success

  Scenario: Successful adding an few entries
    When member has no last entry
    And current voucher is added with 3 entries
    And I add 'voucher' entry for him
    And I close last entry
    And I add 'voucher' entry for him
    And I close last entry
    And I add 'voucher' entry for him
    Then I should be notified about the member entry success
    And I close last entry
    When I add 'voucher' entry for him
    And I should be notified about the member entry error

  Scenario: Error while adding voucher entry to user without voucher
    When member has no last entry
    And he has 0 vouchers
    And he has no current voucher
    And I add 'voucher' entry for him
    Then he has 0 entries
    And I should be notified about the member entry error

  Scenario: Error while adding voucher entry to user with unsufficient amount of left entries on voucher
    When member has no last entry
    And current voucher is added with 0 entries
    And I add 'voucher' entry for him
    And I should be notified about the member entry error

  Scenario: Error while adding entry to member with opened last entry
    When member has no last entry
    And I add 'free' entry for him
    And I add 'free' entry for him
    Then I should be notified about the member entry error
