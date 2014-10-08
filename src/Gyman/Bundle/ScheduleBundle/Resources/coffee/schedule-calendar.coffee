$ ->
  uri = new URI window.location.href
  fragment = new URI(uri.fragment()).search(true)

  if fragment.year? and fragment.week?
    calendarDate = moment().year(fragment.year).isoWeek(fragment.week)  
  else 
    calendarDate = moment()
    
  $('#calendar').fullCalendar
    weekNumberCalculation: "iso"
    year:   calendarDate.year()
    month:  calendarDate.month()
    date:   calendarDate.date()
    header:
      left: 'title'
      center: 'prevYear,prev,today,next,nextYear'
      right: ''
    buttonText:
      prev: '<'
      next: '>'
      prevYear: 'Poprzedni rok'
      nextYear: 'Następny rok'
      today:    'DZIŚ'
      month:    'miesiąc'
      week:     'tydzień'
      day:      'dzień'
    loading: (isLoading, view) ->
      return
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
    editable: false,
    allDaySlot: false
    defaultView: "agendaWeek"
    firstDay: 1
    events: (start, end, tmz, callback) ->
      week = moment(start).isoWeek()
      year = moment(start).year()
      
      $.ajax
        url: Routing.generate('_events_getWeek', {week: week, year: year})
        dataType: 'json',
        success: (result) ->
          uri.removeFragment("week").addFragment "week", week
          uri.removeFragment("year").addFragment "year", year
          window.location.href = uri

          if callback
            callback result

          return

      return

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
      window.modal.showFromUrl Routing.generate("_events_edit", {occurence : event.occurence_id})

    # event.title = "CLICKED!";
    # $('#calendar').fullCalendar('updateEvent', event);
      
#    eventDrop: (event, dayDelta, minuteDelta, allDay, revertFunc, jsEvent, ui, view) ->
#      url = Routing.generate('_events_drag', {occurence: event.id})
#      params =
#        delta:
#          days: dayDelta
#          minutes: minuteDelta
#      modal.showFromUrl(url,params)
#
#    eventResize: (event, dayDelta, minuteDelta, revertFunc, jsEvent, ui, view) ->
#      url = Routing.generate('_events_resize', {occurence: event.id})
#      params =
#        duration: moment.duration(moment(event.end).diff(event.start)).asMinutes()
#      modal.showFromUrl(url,params)
