$ ->
  window.ActivityTab = new ActivityTab()
  window.SearchInput = new SearchInput("#membersSearchAutocomplete")
  window.ActionMenu  = new ActionMenu("#dashboardActionMenu", window.SearchInput)
  window.Timeline    = new Timeline("#dashboardTimeline")
