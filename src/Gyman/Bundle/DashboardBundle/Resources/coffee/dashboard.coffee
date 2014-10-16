$ ->
  window.ActivityTab = new ActivityTab()

  selectedUserHandler = (e, user, datasetName) ->
    window.modal.showFromUrl Routing.generate("_member_edit", {id: user.id})
    $memberSearchAutocompleteInput = $(e.target);
    $memberSearchAutocompleteInput.data "user", user

  $("span#clickToOpenFoundUser").on "click", (e) ->
    user = $('#membersSearchAutocomplete').data 'user'
    return if user is undefined
    window.modal.showFromUrl Routing.generate("_member_edit", {id: user.id})

  $('#membersSearchAutocomplete').typeahead({
      minLength: 2,
      highlight: true,
    },
    {
      name: 'members_search',
      displayKey: 'name'
      source: (query, cb) ->
        $.get Routing.generate("_members_dashboard_search", {members: query}), {}, cb
    }).on("typeahead:selected", selectedUserHandler)

#  .on("typeahead:autocompleted",openUserInWindow);

# Routing.generate("_members_dashboard_search", {members: query})
# window.modal.showFromUrl Routing.generate("_member_edit", {id: obj.id})
#  $('input.typeahead').typeahead
