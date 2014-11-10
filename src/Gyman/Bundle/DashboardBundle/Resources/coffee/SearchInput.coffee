class @SearchInput
  constructor: (selector) ->
    @$searchAutocompleteInput = $(selector)
    @$searchButton = $("span#clickToOpenFoundUser", selector)

    @setupInput()
    @setupInputButton()

  $searchAutocompleteInput: null
  $searchButton: $("span#clickToOpenFoundUser")
  user: null
  handlers: []

  setupInput: () =>
    @$searchAutocompleteInput.typeahead({
        minLength: 3,
        highlight: true,
      },
      {
        name: 'members_search',
        displayKey: 'name'
        templates:
          empty: '<span class="emptyResultsInTypeahead label label-important">brak wyników</span><script>$(window).trigger("dashboard.typeahead.emptyResults");</script>'
        source: (query, cb) ->
          $.get Routing.generate("_members_dashboard_search", {members: query}), {}, cb
      })
    .on("typeahead:selected", @typeAheadSelectedHandler)

  typeAheadSelectedHandler: (e, user, datasetName) =>
    @user = user
    $.each @handlers, (i, handler) ->
      handler(user)

  setupInputButton: () =>
#    @todo: clicking does not work
    @$searchButton.on "click", @inputButtonHandler

  inputButtonHandler: (e) =>
    return if @user is null
    @editUser()

  editUser: () =>
    window.modal.showFromUrl Routing.generate("_member_edit", {id: @user.id})

  subscribe: (handler) =>
    @handlers.push handler

  getUser: () =>
    return @user