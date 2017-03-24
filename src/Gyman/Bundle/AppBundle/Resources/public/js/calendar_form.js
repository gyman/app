$(document).ready(function() {
    var TYPE_SINGLE = "single";
    var TYPE_WEEKLY = "weekly";

    var $calendarNameElement = $("select#create_event_calendar, select#update_event_calendar");
    var $newCalendarNameElement = $("input#create_event_newCalendarName, input#update_event_newCalendarName");

    var $eventTypeElement = $("select#create_event_type, select#update_event_type");
    var $repetitionCheckboxes = $("label[for^='create_event_repetitionDays_'], label[for^='update_event_repetitionDays_']").parents('div.control-group');
    var $endDateElement = $("label[for='create_event_endDate'], label[for='update_event_endDate'], input#create_event_endDate, input#update_event_endDate").parents('div.control-group');

    var typeChangeEventName = "change.calendar_event_type";
    var calendarNameChangeEventName = "change.calendar_name";

    // handlers

    var eventCalendarNameChangeHandler = function(event) {
        var $target = $(event.target);
        var value = $target.val();

        if(value === "") {
            $newCalendarNameElement.parents("div.control-group").show();
        } else {
            $newCalendarNameElement.parents("div.control-group").hide();
        }

        event.preventDefault();
    }

    var eventTypeChangeHandler = function(event) {
        var $target = $(event.target);
        var value = $target.val();

        if(value === TYPE_SINGLE) {
            $repetitionCheckboxes.hide();
            $endDateElement.hide();
        } else if (value === TYPE_WEEKLY)
        {
            $repetitionCheckboxes.show();
            $endDateElement.show();
        }

        event.preventDefault();
    };

    // events

    $eventTypeElement.off(typeChangeEventName).on(typeChangeEventName, eventTypeChangeHandler);
    $eventTypeElement.trigger(typeChangeEventName);

    $calendarNameElement.off(calendarNameChangeEventName).on(calendarNameChangeEventName, eventCalendarNameChangeHandler);
    $calendarNameElement.trigger(calendarNameChangeEventName);
});
