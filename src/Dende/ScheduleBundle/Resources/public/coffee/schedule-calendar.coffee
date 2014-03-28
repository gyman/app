$ ->
  $('#calendar').fullCalendar
    header:
      left: 'title'
      center: 'prevYear,prev,today,next,nextYear'
      right: ''
    buttonText:
      prev: '<span class="icon24 icomoon-icon-arrow-left-2"></span>'
      next: '<span class="icon24 icomoon-icon-arrow-right-3"></span>'
      prevYear: '&laquo;'
      nextYear: '&raquo;'
      today:    'DZIŚ'
      month:    'miesiąc'
      week:     'tydzień'
      day:      'dzień'
    loading: (isLoading, view) ->
      if isLoading
        $("#calendar").block
          message:            '<strong style="z-index:11">Ładuję...</strong>'
          css:
            color:            "#000000"
            height:           "100%"
            left:             "0"
            position:         "absolute"
            top:              "0"
            width:            "100%"
            zIndex:           "10"
            width:            "100%"
            height:           "100%"
            cursor:           'wait' 
            textAlign:        "center"
            backgroundColor:  'rgba(0,0,0,0.2)'
      else
        $("#calendar").unblock()
    editable: true,
    allDaySlot: false
    defaultView: "agendaWeek"
    firstDay: 1
    events: (start, end, callback) ->
      $.ajax
        url: Routing.generate('_events_getWeek', {week: moment(start).isoWeek(), year: moment(end).year()})
        dataType: 'json',
        success: (result) ->
          if callback
            callback result
    timeFormat: 'H:mm{ - H:mm}'
    minTime: "6:00"
    maxTime: "23:00"
    axisFormat: "H:mm"
    columnFormat:
      week: "dddd"
    dayNames: [
      "Niedziela"
      "Poniedziałek"
      "Wtorek"
      "Środa"
      "Czwartek"
      "Piątek"
      "Sobota"
    ]
    dayNamesShort: [
      "Nie"
      "Pon"
      "Wto"
      "Śro"
      "Czw"
      "Pią"
      "Sob"
    ]
    monthNames: [
      "Styczeń"
      "Luty"
      "Marzec"
      "Kwiecień"
      "Maj"
      "Czerwiec"
      "Lipiec"
      "Sierpień"
      "Wrzesień"
      "Październik"
      "Listopad"
      "Grudzień"
    ]
    monthNamesShort: [
      "Sty"
      "Lut"
      "Mar"
      "Kwi"
      "Maj"
      "Cze"
      "Lip"
      "Sie"
      "Wrz"
      "Paź"
      "Lis"
      "Gru"
    ]
    eventClick: (event, element) ->
      event.title = "CLICKED!";
      # $('#calendar').fullCalendar('updateEvent', event);
    eventDrop: (event, dayDelta, minuteDelta, allDay, revertFunc, jsEvent, ui, view) ->
      $.ajax 
        url: Routing.generate('_events_drag', {event: event.id})
        data:
          delta:
            days: dayDelta
            minutes: minuteDelta
        type: 'POST'
        dataType: 'json'
    eventResize: (event, dayDelta, minuteDelta, revertFunc, jsEvent, ui, view) ->
      $.ajax 
        url: Routing.generate('_events_resize', {event: event.id})
        data:
          duration: moment.duration(moment(event.end).diff(event.start)).asMinutes()
        type: 'POST'
        dataType: 'json'