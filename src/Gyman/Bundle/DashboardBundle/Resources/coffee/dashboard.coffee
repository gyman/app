$ ->
  window.ActivityTab = new ActivityTab()
  
  $('input.typeahead').typeahead(
    minLength: 3
    items: 10
    source: (typeahead, query) ->
      $.ajax(
        url: Routing.generate("_members_dashboard_search", {members: query})
        success: (data) =>
          typeahead.process(data)
      )
    onselect: (obj) =>
      window.modal.showFromUrl Routing.generate("_member_edit", {id: obj.id})
    property: "name"
  )
