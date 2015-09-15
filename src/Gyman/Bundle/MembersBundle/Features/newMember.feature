Feature: New member modal popup
    In order to add member
    As a navigator
    I need to open member modal

Scenario: Open modal on new user button click
  Given I am on "http://bjj.local/"
   When I click element "a.createNewMember"
   Then I will wait to see "Nowy użytkownik"
   Then I click element "button.close"

Scenario: Open modal on new user button click
  Given I am on "http://bjj.local/"
   When I click element "a.createNewMember"
   Then I will wait to see "Nowy użytkownik"

   When I click element "a#saveFormInModal"
   Then I will wait to see "Pole nie może być puste!"

   When I fill in "gyman.members.member_form_type_name" with "Jan Kowalski"
    And I click element "a#saveFormInModal"
    And I wait for 5 seconds
   Then I should be on the homepage