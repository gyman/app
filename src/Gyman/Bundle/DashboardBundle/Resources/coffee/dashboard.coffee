$ ->
  window.ActivityTab = new ActivityTab()
  
  $('input.typeahead').typeahead
    minLength: 2
    items: 10
    source: (query, process) ->
      $.ajax(
        url: Routing.generate("_members_dashboard_search", {members: query})
        success: (data) =>
          process data
      )

    matcher: (item) ->
      return ~item["name"].toLowerCase().indexOf(this.query.toLowerCase())

    sorter: (items) ->
      beginswith = []
      caseSensitive = []
      caseInsensitive = []
      item = undefined
      while item = items.shift()
        unless item["name"].toLowerCase().indexOf(this.query.toLowerCase())
          beginswith.push item
        else if ~item["name"].indexOf(this.query)
          caseSensitive.push item
        else
          caseInsensitive.push item
      beginswith.concat caseSensitive, caseInsensitive

    highlighter: (item) ->
      query = @query.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, "\\$&")
      item["name"].replace new RegExp("(" + query + ")", "ig"), ($1, match) ->
        "<strong>" + match + "</strong>"

    onselect: (obj) =>
      console.log obj
      window.modal.showFromUrl Routing.generate("_member_edit", {id: obj.id})