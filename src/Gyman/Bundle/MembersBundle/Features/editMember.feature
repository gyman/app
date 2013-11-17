Feature: Member modal popup
    In order to edit member
    As a navigator
    I need to open member modal

Scenario: A list contain members
  Given I am on "http://bjj.local/"
   When I click element "a.editMember"
   Then I will wait to see "Edycja użytkownika"

Scenario: Check delete button
    When I click element "#deleteUserCheckbox"
    Then I will wait to see element "a#saveFormInModal" with "Usuń" text

Scenario: Uncheck delete button
    When I click element "#deleteUserCheckbox"
    Then I will wait to see element "a#saveFormInModal" with "Zapisz" text

Scenario: Save edited user
    When I uncheck "deleteUserCheckbox"
    And I click element "a#saveFormInModal"
    And I wait for 5 seconds
    Then I should be on the homepage
    