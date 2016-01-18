(($, window) ->

  class OnlyOneActivityPlugin
    defaults:
      foo: 'bar'

    constructor: (el, options) ->
      @options = $.extend({}, @defaults, options)
      @$el = $(el).parents("div.control-group")

      if @$el.data("radiobuttonized") != undefined and @$el.data("radiobuttonized") == true
        return
      @$el.data "radiobuttonized", true

      $checkboxes = @$el.find("input[type=checkbox]")

      @$el.on "change", "input[type=checkbox]", (e) =>
        $checkboxes.prop "checked", false
        $(e.target).prop "checked", true
        $checkboxes.uniform.update()

  $.fn.extend onlyOneActivityPlugin: (option, args...) ->
    @each ->
      $this = $(this)
      data = $this.data('onlyOneActivityPlugin')

      if !data
        $this.data 'onlyOneActivityPlugin', (data = new OnlyOneActivityPlugin(this, option))
      if typeof option == 'string'
        data[option].apply(data, args)

) window.jQuery, window