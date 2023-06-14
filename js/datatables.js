$(document).ready(function() {
    let table = $('table');
    let tbody = table.find('tbody');
    let rows = tbody.find('tr');
    let rowsPerPage = 6; // Number of rows to display per page
    let totalPages = Math.ceil(rows.length / rowsPerPage);
    let currentPage = 1;
  
    function showPage(page) {
      currentPage = page;
  
      tbody.empty();
      let start = (page - 1) * rowsPerPage;
      let end = start + rowsPerPage;
      let displayRows = rows.slice(start, end);
  
      displayRows.each(function() {
        tbody.append($(this));
      });
  
      updatePaginationButtons();
    }
  
    function updatePaginationButtons() {
      $('.pagination-button').removeClass('current-page disabled');
      $('.pagination-button[data-page="' + currentPage + '"]').addClass('current-page');
  
      if (currentPage === 1) {
        $('.pagination-button[data-action="prev"]').addClass('disabled');
      }
  
      if (currentPage === totalPages) {
        $('.pagination-button[data-action="next"]').addClass('disabled');
      }
    }
  
    function setupPagination() {
      let paginationContainer = $('#pagination-container');
      paginationContainer.empty();
  
      let prevButton = $('<button>').text('Previous')
                                    .addClass('pagination-button')
                                    .attr('data-action', 'prev')
                                    .click(function() {
                                      if (currentPage > 1) {
                                        showPage(currentPage - 1);
                                      }
                                    });
  
      let nextButton = $('<button>').text('Next')
                                    .addClass('pagination-button')
                                    .attr('data-action', 'next')
                                    .click(function() {
                                      if (currentPage < totalPages) {
                                        showPage(currentPage + 1);
                                      }
                                    });
  
      paginationContainer.append(prevButton);
  
      for (let i = 1; i <= totalPages; i++) {
        let pageButton = $('<button>').text(i)
                                      .addClass('pagination-button')
                                      .attr('data-page', i)
                                      .click(function() {
                                        let page = parseInt($(this).attr('data-page'));
                                        showPage(page);
                                      });
        paginationContainer.append(pageButton);
      }
  
      paginationContainer.append(nextButton);
  
      updatePaginationButtons();
    }
  
    showPage(1);
    setupPagination();
  });