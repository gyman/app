Feature: New event in schedule

Scenario: Open modal and add new weekly event
  Given I am on "/schedule/calendar"
   When I click element "a#newEventHeaderButton"
   Then I will wait to see modal "Nowe wydarzenie"

   When I open activity selector
    And I will wait to see "BJJ poranny"
    And I choose select2 option "BJJ poranny"
    And I click element "#dende_schedulebundle_event_eventType_0"
    And I fill element "#dende_schedulebundle_event_startDate" with datetime "tomorrow 16:00"
    And I fill element "#dende_schedulebundle_event_duration" with "90"
    And I fill element "#dende_schedulebundle_event_startDate" with datetime "+1 month"
    And I check "#dende_schedulebundle_event_days_0"
    And I uncheck "#dende_schedulebundle_event_days_1"
    And I check "#dende_schedulebundle_event_days_2"
    And I uncheck "#dende_schedulebundle_event_days_3"
    And I check "#dende_schedulebundle_event_days_4"
    And I uncheck "#dende_schedulebundle_event_days_5"
    And I uncheck "#dende_schedulebundle_event_days_6"




