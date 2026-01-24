const PREF = "PREFERENCE";

function BlogPage() {
  // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
  // #region: setup
  // Set default preference:
  if (!localStorage.getItem(PREF)) localStorage.setItem(PREF, "landscape");
  // Define Array of View Toggles
  const viewToggleElArray = Array.from(
    document.querySelectorAll(".js\\:view-toggle"),
  );
  // Define Wrapper Element
  const wrapper = document.querySelector(".js\\:blog-posts");
  // Abandon early if not found
  if (!wrapper || !viewToggleElArray?.length) return;
  // #endregion: setup
  // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
  // #region: initial actions
  // Set Initial Active Values
  enableActiveView();
  // Add Observers to Toggles
  viewToggleElArray.forEach(observeToggle);
  // #endregion: initial actions
  // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
  // #region: observers
  function observeToggle(toggle) {
    toggle.addEventListener("click", handleToggleClickEvt);
  }
  // #endregion: observers
  // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
  // #region: event handlers
  function handleToggleClickEvt() {
    localStorage.setItem(PREF, this.dataset.view);
    enableActiveView();
  }
  // #endregion: event handlers
  // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
  // #region: actions
  function enableViewToggles() {
    viewToggleElArray.forEach((toggle) => toggle.removeAttribute("disabled"));
  }

  function enableActiveView() {
    enableViewToggles();
    // Get our view preference from local storage:
    const preferenceString = localStorage.getItem(PREF);
    const matchingToggleEl = findMatchingToggleEl(preferenceString);
    // Disable the active toggle button
    matchingToggleEl.disabled = true;
    // Set the data attribute on the wrapper
    wrapper.setAttribute("data-view", preferenceString);
  }
  // #endregion: actions
  // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
  // #region: helpers
  function findMatchingToggleEl(pref) {
    return viewToggleElArray.find((view) => view.dataset.view === pref);
  }
  // #endregion: helpers
  // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
}

document.addEventListener("DOMContentLoaded", BlogPage);
