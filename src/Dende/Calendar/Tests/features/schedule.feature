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

  Scenario: Inserting 3 new single events into calendar
    When I add new calendar event with data
      | type    | startDate | endDate      | duration | title         | repetition  |
      | single  | -1 hour   | +30 minutes  | 90       | Test event 1  |           - |
      | single  | -3 hours  | -90 minutes  | 90       | Test event 2  |           - |
      | single  | +1 hour   | +150 minutes | 90       | Test event 3  |           - |
    Then calendar has 3 events
    And current event has title 'Test event 1'
    And calendar returns 3 event for current week

  Scenario: Inserting new weekly events into calendar
    When I add new calendar event with data
      | type    | startDate           | endDate             | duration | title        | repetition                |
      | weekly  | 2015-09-01 12:00:00 | 2015-09-30 13:30:00 | 90       | Test event 1 | monday, wednesday, friday |
      | weekly  | 2015-09-01 12:00:00 | 2015-09-20 13:00:00 | 60       | Test event 2 | monday, friday            |
      | weekly  | 2015-09-01 12:00:00 | 2015-09-30 13:30:00 | 90       | Test event 3 | thursday                  |
      | weekly  | 2015-09-21 12:00:00 | 2015-09-30 13:30:00 | 90       | Test event 4 | monday, wednesday, friday |
      | weekly  | 2015-10-01 12:00:00 | 2015-10-30 13:30:00 | 90       | Test event 5 | thursday                  |
    Then calendar has 5 events
    And there are 32 occurrences
    And calendar returns 3 events for date range from "2015-09-01" to "2015-09-06"
    And calendar returns 4 occurrences for date range from "2015-09-01" to "2015-09-06"
    And calendar returns 3 events for date range from "2015-09-07" to "2015-09-13"
    And calendar returns 6 occurrences for date range from "2015-09-07" to "2015-09-13"
    And calendar returns 3 events for date range from "2015-09-14" to "2015-09-20"
    And calendar returns 6 occurrences for date range from "2015-09-14" to "2015-09-20"
    And calendar returns 3 events for date range from "2015-09-21" to "2015-09-27"
    And calendar returns 7 occurrences for date range from "2015-09-21" to "2015-09-27"
    And calendar returns 2 events for date range from "2015-09-28" to "2015-09-30"
    And calendar returns 4 occurrences for date range from "2015-09-28" to "2015-09-30"
