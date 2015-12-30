(($, window) ->

  class SearchInput
    defaults:
      foo: 'bar'

    constructor: (el, options) ->
      @options = $.extend({}, @defaults, options)
      @$el = $(el)

      @setupOnChangeEvent()

    setupOnChangeEvent: ->
      @$el.on 'keyup', (e) ->
        query = $(e.target).val()
        route = Routing.generate("gyman_members_typeahead", {query: query})
        $.get route, (data) ->
          console.log data

  $.fn.extend searchInput: (option, args...) ->
    @each ->
      $this = $(this)
      data = $this.data('searchInput')

      if !data
        $this.data 'searchInput', (data = new SearchInput(this, option))
      if typeof option == 'string'
        data[option].apply(data, args)

) window.jQuery, window