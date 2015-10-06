Feature: Schedule adding, removing, editting

  Background:
    Given I have calendar created

  Scenario: Inserting new single event into calendar
    When I add new calendar event with data
    | type    | startDate | endDate     | duration | title      | repetition  |
    | single  | -1 hour   | +30 minutes | 90       | Test event |           - |
    Then calendar has 1 events
    And current event has title 'Test event'
    And calendar returns 1 event for current week

  Scenario: Inserting new weekly event into calendar
    When I add new calendar event with data
    | type    | startDate           | endDate             | duration | title      | repetition                |
    | weekly  | 2015-09-01 12:00:00 | 2015-09-30 13:30:00 | 90       | Test event | monday, wednesday, friday |
    Then calendar has 1 events
    And calendar has 13 occurences
