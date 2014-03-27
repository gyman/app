$ ->
  # deleting filters from tabs

  $(document).off("click.filters.list.filter.delete").on "click.filters.list.filter.delete", "span.delete-filter", (e) ->
    e.preventDefault()
    e.stopPropagation()
    return if !confirm("Czy na pewno chcesz usunąć filtr?")
    $tab = $(e.currentTarget).parents("li")
    href = $(e.currentTarget).attr("data-href")
    $.get href, (response) =>
      $tabs = $tab.parents("ul").find("li")
      $tabs.removeClass "active"
      $tabs.filter(":first-child").addClass("active")
      $tab.remove()
      datatable.fnReloadAjax()

  # setting filters from tabs

  $(document).off("click.filters.list.filter.set").on "click.filters.list.filter.set", "ul#filterTabs.nav li a", (e) ->
    e.preventDefault()
    e.stopPropagation()
    $tabContainer = $(e.currentTarget).parents("ul#filterTabs")
    $tab = $(e.currentTarget).parents("li")
    return if $tab.hasClass "active"
    href = $(e.currentTarget).attr("href")
    $.get href, (response) =>
      $tabContainer.find("li").removeClass("active")
      $tab.addClass("active")
      datatable.fnReloadAjax()

  # adding favourites

  $(document).off("click.filters.list.favourite.toggle").on "click.filters.list.favourite.toggle", "a.starToggle", (e) ->
    e.preventDefault()
    e.stopPropagation()
    href = $(e.currentTarget).attr("href")
    $.get href, (response) =>
      if response.starred
        $(e.currentTarget).addClass "starred"
      else
        $(e.currentTarget).removeClass "starred"