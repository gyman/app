class window.ActivityTab
  constructor: () ->
    @setupTab()
    @setupNavigation()
    @setupAutorefresh()
  
  interval: null

  setupTab: () =>
    @$tab = $("#activitiesTab")
    @$prev = $(".prevActivityDay",@$tab)
    @$next = $(".nextActivityDay",@$tab)

  setupAutorefresh: () =>
    @interval = setInterval(() =>
      @reloadTab()
    , 5 * 60 * 1000)

  setupNavigation: () =>
    @$prev.data("step",-1)
    @$next.data("step",1)
    
    @$prev.off("click").on "click", @handleClickNavigation
    @$next.off("click").on "click", @handleClickNavigation
    
  handleClickNavigation: (e) =>
    e.preventDefault()
    newDate = moment(@$tab.data("date")).add "days", $(e.target).data("step")
    @$tab.data "date", newDate
    @reloadTab()
    
  reloadTab: () =>
    date = moment(@$tab.data "date").format("YYYY-MM-DD")
    
    $.ajax
      url: Routing.generate('gyman_dashboard_getActivities', {date: date})
      success: (response) =>
        @$tab.replaceWith response
        @setupTab()
        @setupNavigation()
      type: "GET"
