$ ->
  window.activityTab = new ActivityTab()

  window.searchInput = new SearchInput("#membersSearchAutocomplete")
  window.actionMenu  = new ActionMenu("#dashboardActionMenu", window.searchInput)

#  window.Timeline    = new Timeline("#dashboardTimeline")
