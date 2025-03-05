"use strict";

/*-----
 * Isotope configuration
 *
 * @see: combined search and buttons:
 *       https://codepen.io/rowild/pen/JZPMpx?editors=1010
 * @see: Vanilla JS search:
 *----- */

/*----
 * Global vars
 *---- */
// "Global", because they need to be cleared by other functions outside of "initializeCatalog"
    qsRegex = "", // quick search regex
    searchInputField = null;

/* ----
 * Initialize the "Catalog of Works" Isotope
 * ---- */

function initializeCatalog() {
  "use strict";
  searchInputField = document.querySelector(".c-quicksearch");

  // Configure the Isotope.
  var iso = new Isotope('.grid', {
    itemSelector: '.product-item',
    percentPosition: false,
    layoutMode: 'fitRows',
    getSortData: {
      name: ".card-title",
    },
    filter: function filter(itemElem) {
      console.log("called the filter option on the iso");

      var searchResult = qsRegex ? itemElem.querySelector('.card-title').innerText.match(qsRegex) : true;
      console.log("searchResult", searchResult);
      return searchResult;
    }
  });
};


  // Search; must be inside the function
  searchInputField.addEventListener('keyup', debounce(function (e) {
    qsRegex = new RegExp(searchInputField.value, 'gi');
    // console.log("searchinputfield qsRegex =", qsRegex);
    iso.arrange({
      filter: function (itemElem) {
        // console.log("called the filter option on the isoGrid, qsRegex =", qsRegex);
        let searchResult = qsRegex ? itemElem.querySelector('.card-title').innerText.match(qsRegex) : true
        return searchResult
      }
    });
  }, 250))

  searchInputField.addEventListener('focus', handleShowAllFilter);
  searchInputField.params = handleShowAllFilterParams



/*-----
 * Main "UI-changing" functions: handleSorting & handle Filter
 *----- */

/**
 * Handle the sort-by process.
 * Handles the "by date" or "by c-opus__title" sorting and
 * toggles the active state of the sortBy filter buttons.
 * @param e
 */
function handleSorting(e) {
  "use strict";

  e.preventDefault();

  var curTarget = e.currentTarget,
      grid = curTarget.params.isoGrid,
      sortByTerms = curTarget.dataset.sortBy;

  // Remove any is-checked classes
  if (curTarget.parentNode.querySelector(".is-checked").classList.contains("is-checked")) {
    curTarget.parentNode.querySelector(".is-checked").classList.remove("is-checked");
  }

  // Add current is-checked status
  curTarget.classList.add("is-checked");

  // Update the isotope
  grid.arrange({
    sortBy: sortByTerms
  });

  // Clear the search input field from any search text
  clearSearchInputField();
}

/**
 * Handle the filtering process.
 * @param e
 */
function handleFilter(e) {
  "use strict";

  var curTarget = e.currentTarget,
      grid = curTarget.params.isoGrid,
      showAllBtn = curTarget.params.showAllBtn,
      filterList = curTarget.params.filterList,
      filter = curTarget.dataset.filterByCategory,
      isChecked = curTarget.classList.toggle("is-checked");

  if (isChecked) {
    addFilter(filterList, filter);
  } else {
    removeFilter(filterList, filter);
  }

  // Filter the Isotope of composition now by calling arrange filter.
  // Join all filters, if there are more than one, to a list.
  grid.arrange({
    filter: filterList.join(",")
  });

  // Check, if the show all button should be checked or not.
  // If no other filters are active, it should be checked,
  // otherwise, as soon as there is another filter active,
  // the is-checked state should be removed
  checkShowAllBtnStatus(showAllBtn, filterList);

  // clear the text from the searchInputField
  clearSearchInputField();
}

/*-----
 * Filter-related functions
 *----- */


/**
 * Show all elements of the isotope (no filters active)
 * @param e
 */
function handleShowAllFilter (e) {
  'use strict'
  let curTarget = e.currentTarget,
    filterList = curTarget.params.filterList,
    grid = curTarget.params.isoGrid,
    showAllBtn = curTarget.params.showAllBtn,
    parentEl = curTarget.params.parentEl;

  // First, set the filter array to 0
  resetFilter(filterList)

  // Then clear all buttons from their is-checked status
  resetIsCheckedBtns(parentEl)

  // Set the showAllBtn to is-checked
  checkShowAllBtnStatus(showAllBtn, filterList)

  // Clear the text from the search input field
  clearSearchInputField();

  // Re-arrange the isotope
  grid.arrange({
    filter: ''
  })

}

/**
 * Add an active filter to the filter array.
 * @param filterList
 * @param filter
 */
function addFilter(filterList, filter) {
  "use strict";

  console.log("filter", filter);

  if (filterList.indexOf(filter) === -1) {
    filterList.push(filter);
  }

  console.log("filterList", filterList);
}

/**
 * Remove a filter from the filter array
 * @param filterList
 * @param filter
 */
function removeFilter(filterList, filter) {
  "use strict";

  var index = filterList.indexOf(filter);
  if (index !== -1) {
    filterList.splice(index, 1);
  }
}

/**
 * Show all elements of the isotope (no filters active)
 * @param e
 */
function handleShowAllFilter(e) {
  "use strict";

  var curTarget = e.currentTarget,
      filterList = curTarget.params.filterList,
      parentEl = curTarget.parentElement,
      grid = curTarget.params.isoGrid;

  // First, set the filter array to 0
  resetFilter(filterList);

  // Then clear all buttons from their is-checked status
  resetIsCheckedBtns(parentEl);

  // Set the showAllBtn to is-checked
  checkShowAllBtnStatus(curTarget, filterList);

  // Re-arrange the isotope
  grid.arrange({
    filter: ""
  });

  // Clear the text from the search input field
  clearSearchInputField();
}

/**
 * Clear the filter array, when "show all" was clicked.
 * @param filterList
 */
function resetFilter(filterList) {
  "use strict";

  filterList.splice(0, filterList.length);
}

/**
 * Check, if the "Show all Compositions" button should
 * have 'is-checked' state or not
 * @param btn
 * @param filterArr
 */
function checkShowAllBtnStatus(btn, filterArr) {
  if (filterArr.length === 0) {
    if (!btn.classList.contains("is-checked")) {
      btn.classList.add("is-checked");
    }
  } else {
    if (btn.classList.contains("is-checked")) {
      btn.classList.remove("is-checked");
    }
  }
}

/* -----
 * Button states
 * ----- */

/**
 * Remove all "is-checked" classes, when "show all" was clicked.
 * @param el
 */
function resetIsCheckedBtns(el) {
  "use strict";

  // check if the element, that contains the filter buttons, has children
  if (el.getElementsByClassName("is-checked")) {
    var checked = el.getElementsByClassName(
      "c-btn--filter-by-category is-checked"
    );

    while (checked.length > 0) {
      checked[0].classList.remove("is-checked");
    }
  }
}

/* ----
 * Clear search input field
 * ---- */

function clearSearchInputField() {
  document.querySelector(".c-quicksearch").value = "";
  qsRegex = "";
}

/* ----
 * Debounce, so filtering doesn't happen every millisecond.
 * ---- */
function debounce(fn, threshold) {
  var timeout = void 0;
  threshold = threshold || 100;
  return function debounced() {
    clearTimeout(timeout);
    var args = arguments;
    var _this = this;
    function delayed() {
      fn.apply(_this, args);
    }
    timeout = setTimeout(delayed, threshold);
  };
}

/*----
 * Start the application
 *---- */

window.onload = function() {
  "use strict";
  if (document.querySelector(".c-grid__compositions")) {
    initializeCatalog();
  }
};
