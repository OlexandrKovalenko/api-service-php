$(document).ready(function() {
    $('#search-form').on('input', function() {
        var inputData = $(this).val();
        const hintDiv = document.getElementById("global-search-list");

        if (inputData.length >= 2) {
            $.ajax({
                url: '/search', // Укажите путь к вашему бэкенд-файлу
                method: 'POST',
                data: { input_data: inputData },
                dataType: "json",
                success: function(response) {
                    let data = JSON.parse(response)
                    hintDiv.classList.add('active');
                    if(Object.keys(data).length > 1) {
                        const hintRowDiv = document.querySelector(".row");
                        if (hintRowDiv.hasChildNodes()) {
                            while (hintRowDiv.firstChild) {
                                hintRowDiv.removeChild(hintRowDiv.firstChild);
                            }
                        }

                        for (var key in data) {
                            if (data.hasOwnProperty(key)) {
                                let model = data[key]['model'];
                                let category = getCategoryName(model);
                                let link = '/'+category[0]+'/'+data[key]['id']

                                const hintListDiv = document.createElement("div");
                                hintListDiv.classList.add("col-md-4");
                                const spanElement = document.createElement("span");
                                const aElement = document.createElement("a");
                                aElement.classList.add(
                                    "link-"+category[1],
                                    "link-offset-2",
                                    "link-underline-opacity-25",
                                    "link-underline-opacity-100-hover"
                                );

                                aElement.href = link;
                                aElement.textContent = data[key]['inventory_number'] ||
                                    data[key]['inventory_number'] ||
                                    data[key]['number'] ||
                                    data[key]['name'] ||
                                    data[key]['full_name'];
                                spanElement.appendChild(aElement);
                                hintListDiv.appendChild(spanElement);
                                hintRowDiv.appendChild(hintListDiv);
                            }
                          }
                    }
                    else {
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        } else {
            if (hintDiv.classList.contains("active")) {
                hintDiv.classList.remove("active");
            }
        }
    });
});

function getCategoryName(categoryId) {
    switch (categoryId) {
      case 'equipment':
        return ["equipment", "primary"];
      case 'bodies':
        return ["case", "success"];
      case 'terminals':
        return ["terminal", "info"];
    case 'counterparties':
        return ["counterparty", "warning"];
    }
  }