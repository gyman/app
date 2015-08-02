Feature: Creating user
    In order to register new user
    I create new Member and store it in repository
    Then I'm noticed about successful creation or an error

    Scenario: Adding a new Member to empty repository
        Given there is no members
        When I add new member with data:
            | firstname | lastname |
            | Grzegorz  | Kaszuba  |
        Then I have 1 user in repository