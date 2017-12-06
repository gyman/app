class @Timeline
  constructor: (selector) ->
    @selector = selector
    @loadTimeline()
    @setupInterval(15000)
    @setupEvent()

  selector: null
  interval: null

  loadTimeline: () =>
    $(@selector).load Routing.generate "gyman_timeline_index"

  setupInterval: (miliseconds) =>
    @interval = setInterval @loadTimeline, miliseconds

  setupEvent: () =>
    $(window).on "dashboard.timeline.reload", (e) =>
      @loadTimeline()