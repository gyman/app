$ ->
  $('#calendar').fullCalendar
    header: false
    allDaySlot: false
    defaultView: "agendaWeek"
    firstDay: 1
    events: window.scheduleEvents
    timeFormat: 'H:mm'
    minTime: "8:00"
    maxTime: "23:00"
    axisFormat: "H:mm"
    columnFormat:
      week: "dddd"
    dayNames:[
      "Niedziela"
      "Poniedziałek"
      "Wtorek"
      "Środa"
      "Czwartek"
      "Piątek"
      "Sobota"
    ]