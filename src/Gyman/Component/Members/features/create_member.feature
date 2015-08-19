Feature: Creating user
  In order to register new user
  I create new Member and store it in repository
  Then I'm noticed about successful creation or an error

  Scenario: Successfully creating a new Member with a details and email
    Given there is no members
    When I add new member with data:
        | firstname | lastname | email            |
        | Grzegorz  | Kaszuba  | uirapuru@tlen.pl |
    Then I have 1 user in repository
    And I should be notified about the member project creation success

  Scenario: Creating a new Member without data
    Given there is no members
    When I add new member without any data
    Then I have 0 user in repository
    And I should be notified about the member project creation failure