class @ActionMenu
  constructor: (selector, searchInput) ->
    @$actionMenu = $(selector)
    @searchInput = searchInput
    @setupButtons()
    @subscribeForUserChange()
    @setupEmptyResults()

  $actionMenu: null
  searchInput: null
  user: null

  actions:
    new_sell:
      selector:     "a#actionSell"
      routing:      "_member_new"
      userRequired: true
    new_entry:
      selector:     "a#actionEntry"
      routing:      "_entrance_add"
      userRequired: true
    new_voucher:
      selector:     "a#actionVoucher"
      routing:      "_voucher_new"
      userRequired: true
    new_member:
      selector: "a#actionMember"
      routing: "_member_new"
    calendar:
      selector: "a#actionCalendar"
      routing: "_schedule_calendar"

  setupEmptyResults: () =>
    $(window).on "dashboard.typeahead.emptyResults", (e) =>
      @user = null
      @setupButtons()

  subscribeForUserChange: () =>
    @searchInput.subscribe(@updatedUserHandler)

  updatedUserHandler: (user) =>
    @user = user
    @setupButtons()

  setupButtons: () =>
    @buildRoutes()

    if @user?
      @enableButtons()
    else
      @disableButtons()

  disableButtons: () =>
    $.each @actions, (i, element) ->
      return if !element.userRequired?
      $(element.selector).addClass "disabled"

  enableButtons: () =>
    @$actionMenu.find("li > a").removeClass "disabled"

  buildRoutes: () =>
    return if !@user?
    $.each @actions, (i, element) =>
      return if !element.userRequired?
      $(element.selector).attr "href", Routing.generate element.routing, {"id" : @user.id}
