document.addEventListener("DOMContentLoaded", function () {
    const table = document.getElementById("table");
    const prevPageButton = document.getElementById("prevPage");
    const preCurrentPageButton = document.getElementById("preCurrentPage");
    const currentPageButton = document.getElementById("currentPage");
    const nextCurrentPageButton = document.getElementById("nextCurrentPage");
    const nextPageButton = document.getElementById("nextPage");
  
    const rowsPerPage = 20; // Кількість рядків на сторінці
    let currentPage = 1;
    let totalRows = table.rows.length - 1; // Враховуємо заголовок таблиці
  
    // Оновлення відображення таблиці на поточній сторінці
    function updateTable() {
      const startIdx = (currentPage - 1) * rowsPerPage;
      const endIdx = startIdx + rowsPerPage;
  
      for (let i = 1; i < table.rows.length; i++) {
        if (i > startIdx && i <= endIdx) {
          table.rows[i].style.display = "table-row";
        } else {
          table.rows[i].style.display = "none";
        }
      }
  
      preCurrentPageButton.textContent = currentPage - 1;
      currentPageButton.textContent = currentPage;
      nextCurrentPageButton.textContent = currentPage + 1;
  
      // Встановлюємо стан кнопок "назад" і "вперед"
      if (currentPage === 1) {
        prevPageButton.classList.add("disabled");
        preCurrentPageButton.classList.add("hide");
      } else {
        prevPageButton.classList.remove("disabled");
        preCurrentPageButton.classList.remove("hide");
      }
  
      if (currentPage * rowsPerPage >= totalRows) {
        nextPageButton.classList.add("disabled");
      } else {
        nextPageButton.classList.remove("disabled");
      }
    }
  
    // Обробник для кнопки "Попередня"
    prevPageButton.addEventListener("click", function () {
      if (currentPage > 1) {
        currentPage--;
        updateTable();
      }
    });
  
    // Обробник для кнопки "Наступна"
    nextPageButton.addEventListener("click", function () {
      const totalPages = Math.ceil(totalRows / rowsPerPage);
  
      if (currentPage < totalPages) {
        currentPage++;
        updateTable();
      }
    });
  
    // Обробник для кнопок з номерами сторінок
    preCurrentPageButton.addEventListener("click", function () {
      if (currentPage > 1) {
        currentPage--;
        updateTable();
      }
    });
  
    nextCurrentPageButton.addEventListener("click", function () {
      const totalPages = Math.ceil(totalRows / rowsPerPage);
  
      if (currentPage < totalPages) {
        currentPage++;
        updateTable();
      }
    });
  
    // Ініціалізація таблиці
    updateTable();
  });
  