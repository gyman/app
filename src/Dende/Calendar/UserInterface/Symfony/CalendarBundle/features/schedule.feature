Feature: Schedule adding, removing, editting

  Background:
    Given I have calendar created

  Scenario: Inserting new single event into calendar
    When I add new calendar event with data
    | type    | section | startDate | endDate | duration | title      | repetition  |
    | single  |  null   | now       | null    | 90       | Test event |       null  |
    Then calendar has 1 event
    And current event has title 'Test event'
    And calendar returns 1 event for current week
    And I get notification about successful voucher creation.
