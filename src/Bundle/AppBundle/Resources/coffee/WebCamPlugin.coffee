(($, window) ->

  class WebCamPlugin
    defaults:
      foo: 'bar'

    constructor: (el, options) ->
      @options = $.extend({}, @defaults, options)
      @$el = $(el)

      $("a[href='#filePane']").on "click", (e) =>
        @destroyDiv()

      $("a[href='#webcamDiv']").on "click", (e) =>
      $("a[href='#webcamDiv']").on "click", (e) =>
        a = setTimeout () =>
          @setupDiv()
        , 500

      $("a[href='#webcamDiv']").trigger "click"

    setupDiv: () ->
      $div = @$el.find("div#camera")
      $div.photobooth()

      if !$div.data("photobooth").isSupported
        alert "Twoja przeglądarka nie obsługuje kamery"
        return

      $div.data("photobooth").resize 300, 240

      $div.on "image", (event, dataUrl) ->
        $("img#memberFoto").attr 'src', dataUrl
        $("input#member_fotoData").val dataUrl
        $("a[href='#filePane']").trigger "click"

    destroyDiv: () ->
      $div = @$el.find("div#camera")
      $div.data("photobooth").destroy()

  $.fn.extend webCamPlugin: (option, args...) ->
    @each ->
      $this = $(this)
      data = $this.data('webCamPlugin')

      if !data
        $this.data 'webCamPlugin', (data = new WebCamPlugin(this, option))
      if typeof option == 'string'
        data[option].apply(data, args)

) window.jQuery, window