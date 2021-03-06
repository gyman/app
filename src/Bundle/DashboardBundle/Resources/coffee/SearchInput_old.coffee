class window.SearchInput
  
  constructor: (selector) ->
    @$searchAutocompleteInput = $(selector)
    @$searchButton = @$searchAutocompleteInput.siblings("#clickToOpenFoundUser")

    @setupInput()
    @setupInputButton()

  $searchAutocompleteInput: null
  $searchButton: null
  user: null
  handlers: []

  setupInput: () =>
    @$searchAutocompleteInput.typeahead({
        minLength: 3,
        highlight: true,
      },
      {
        name: 'members_search'
        displayKey: 'email'
        display: (a,b,c,d) =>
          console.log a, b, c, d
        templates:
          empty: [
            '<span class="emptyResultsInTypeahead label label-important">brak wyników</span>',
#            '<script>$(window).trigger("dashboard.typeahead.emptyResults");</script>'
          ]
        source: (query, cb) ->
          $.get Routing.generate("gyman_members_typeahead", {query: query}), {}, cb
      })
    .on("typeahead:selected", @typeAheadSelectedHandler)

  typeAheadSelectedHandler: (e, user, datasetName) =>
    @user = user
    $.each @handlers, (i, handler) ->
      handler(user)

  setupInputButton: () =>
    @$searchButton.on "click", @inputButtonHandler

  inputButtonHandler: (e) =>
    return if @user is null
    @editUser()

  editUser: () =>
#    window.modal.showFromUrl Routing.generate("gyman_member_edit", {id: @user.id})
    window.location = Routing.generate("gyman_member_edit", {id: @user.id})


  subscribe: (handler) =>
    @handlers.push handler

  getUser: () =>
    return @user