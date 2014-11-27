class @SwitchClub
  constructor: (selector)->
    @$form = $(selector)
    @$select = @$form.find("#gyman_default_clubswitch_club")
    @setupSelect()

  $form: null
  $select: null

  setupSelect: () =>
    @$select.on "change", (e) =>
      clubId = $(e.target).val()
      $.get Routing.generate("gyman_default_set_current_club", {club: clubId}), {}, (data) =>
        window.location.reload() if data.status == "ok"

