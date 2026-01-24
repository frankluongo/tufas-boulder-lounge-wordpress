// On DOMContentLoaded, initialize app
document.addEventListener("DOMContentLoaded", init);
// Define app initialization function
function init() {
  MeasureHeader();
  Toggles();
  DropdownMenus();
}
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
function DropdownMenus() {
  const dropdowns = document.querySelectorAll(".js\\:dropdown-menu");
  if (!dropdowns) return;
  dropdowns.forEach(DropdownMenu);
}

function DropdownMenu(menuEl) {
  const items = menuEl.querySelectorAll(".menu-item-has-children");
  if (!items) return;
  items.forEach(DropdownMenuItem);
}

function DropdownMenuItem(itemEl) {
  // ------------------------------------------------
  // #region: consts and lets
  const submenuEl = itemEl.querySelector(".sub-menu");
  const topLink = itemEl.querySelector(":scope > a");
  const EXPANDED_CLASS = "is-expanded";
  const READY_CLASS = "is-ready";
  let isObservingFocus = false;
  // #endregion: consts and lets
  // ------------------------------------------------
  // #region: init and destroy
  // Init or destroy depending on the user's media:
  const media = window.matchMedia("(hover: hover) and (width >= 1100px)");
  media.matches ? init() : destroy();
  media.addEventListener("change", (e) => {
    e.matches ? init() : destroy();
  });
  // Init & Destroy Functions
  function destroy() {
    itemEl.removeAttribute("aria-expanded");
    itemEl.removeAttribute("aria-haspopup");
    submenuEl.removeAttribute("inert");
    itemEl.removeEventListener("mouseenter", handleItemMouseEnterEvt);
    itemEl.removeEventListener("mouseleave", handleItemMouseLeaveEvt);
    topLink.removeEventListener("focus", handleTopLinkFocusEvt);
  }

  function init() {
    submenuEl.id = `submenu-${itemEl.id}`;
    submenuEl.setAttribute("aria-labelledby", itemEl.id);
    submenuEl.setAttribute("inert", "");
    itemEl.setAttribute("aria-expanded", false);
    itemEl.setAttribute("aria-haspopup", true);
    itemEl.setAttribute("aria-controls", submenuEl.id);
    itemEl.addEventListener("mouseenter", handleItemMouseEnterEvt);
    itemEl.addEventListener("mouseleave", handleItemMouseLeaveEvt);
    topLink.addEventListener("focus", handleTopLinkFocusEvt);
  }
  // #endregion: init and destroy
  // ------------------------------------------------
  // #region: event handlers
  function handleItemMouseEnterEvt() {
    showMenu();
  }
  function handleItemMouseLeaveEvt() {
    hideMenu();
  }
  function handleTopLinkFocusEvt() {
    showMenu();
    if (!isObservingFocus) {
      document.addEventListener("focus", handleDocumentFocusEvt, true);
    }
    isObservingFocus = true;
  }

  function handleDocumentFocusEvt(event) {
    if (!itemEl.contains(event.target)) {
      hideMenu();
    }
  }
  // #endregion: event handlers
  // ------------------------------------------------
  // #region: actions
  async function hideMenu() {
    itemEl.setAttribute("aria-expanded", false);
    submenuEl.setAttribute("inert", "");
    itemEl.classList.remove(EXPANDED_CLASS);
    submenuEl.classList.remove(EXPANDED_CLASS);
    await new Promise((res) => setTimeout(res, 250));
    submenuEl.classList.remove(READY_CLASS);
    document.removeEventListener("focus", handleDocumentFocusEvt, true);
    isObservingFocus = false;
  }

  async function showMenu() {
    itemEl.setAttribute("aria-expanded", true);
    submenuEl.removeAttribute("inert");
    itemEl.classList.add(EXPANDED_CLASS);
    submenuEl.classList.add(READY_CLASS);
    await new Promise((res) => setTimeout(res, 0));
    submenuEl.classList.add(EXPANDED_CLASS);
  }

  // #endregion: actions
  // ------------------------------------------------
}
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// #region: measure header
function MeasureHeader() {
  const header = document.querySelector(".js\\:tufas-header");
  if (!header) return;

  setHeaderHeight();
  window.addEventListener("resize", setHeaderHeight);

  function setHeaderHeight() {
    const headerHeight = header.offsetHeight;
    document.documentElement.style.setProperty(
      "--tufas-header-height",
      `${headerHeight}px`,
    );
  }
}
// #endregion: measure header
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// #region: toggles
function Toggles() {
  const toggles = document.querySelectorAll(".js\\:toggle");
  if (!toggles) return;
  toggles.forEach(Toggle);
}

function Toggle(toggleEl) {
  try {
    let expandedState = toggleEl.getAttribute("aria-expanded") === "true";
    const media = toggleEl.dataset.media;
    const controlledEl = document.getElementById(
      toggleEl.getAttribute("aria-controls"),
    );
    if (!media) return initToggle();
    const mediaQuery = window.matchMedia(media);
    if (mediaQuery.matches) {
      toggleEl.addEventListener("click", handleToggleClickEvt);
    }
    mediaQuery.addEventListener("change", (e) => {
      e.matches ? initToggle() : destroyToggle();
    });

    function initToggle() {
      toggleEl.addEventListener("click", handleToggleClickEvt);
    }

    function destroyToggle() {
      toggleEl.removeEventListener("click", handleToggleClickEvt);
    }

    async function handleToggleClickEvt() {
      expandedState = !expandedState;
      expandedState ? openMenu() : closeMenu();
    }

    async function closeMenu() {
      toggleEl.setAttribute("aria-expanded", false);
      document.body.classList.remove("locked");
      controlledEl.classList.remove("is-expanded");
      await new Promise((resolve) => setTimeout(resolve, 250));
      controlledEl.classList.remove("is-ready");
    }

    async function openMenu() {
      toggleEl.setAttribute("aria-expanded", true);
      document.body.classList.add("locked");
      controlledEl.classList.add("is-ready");
      await new Promise((resolve) => setTimeout(resolve, 0));
      controlledEl.classList.add("is-expanded");
    }
  } catch (error) {
    console.error("Error initializing toggle:", error);
  }
}
// #endregion: toggles
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
