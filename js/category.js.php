<script>
  let redirectProduct;
  let mouseDown;
  let mouseUp;
  $("document").ready(function () {
    redirectProduct = function (id) {
      window.location.assign(`product.php?product_id=${id}`);
    };

    mouseDown = function (id) {
      // Logic for adding to basket
      $.ajax({
        url: "api/basket.php",
        type: "post",
        data: { product_id: id },
        success: function (response) {
          assign_row_count(response.row_count);
        },
      });
      // Logic for changing button style
      $(`.${id}add`).css("background-color", "#15803D");
      $(`.${id}add`).html("Item added to basket!");
      function fn() {
        $(`.${id}add`).css("background-color", "#14532D");
        $(`.${id}add`).html("Add to basket");
      }
      setTimeout(fn, 800);
    };

    const params = new URL(document.location).searchParams;
    const id = params.get("category_id");

    function getProducts(selection) {
      $.ajax({
        url: `api/product.php?category_id=${id}&sort_by=${selection}`,
        type: "get",
        success: function (response) {
          const count = response.count;
          const data = response.data;
          $("#count").empty();
          $("#products").empty();
          $("#count").append(count + " products found");
          response.data.forEach((product) => {
            $("#products").append(`
                    <div id="container">
                        <div onClick="redirectProduct(id)" id = ${product.id
              } class= "bestseller__item" > 
                           <img class="bestseller__item__image" src=${product.photo
              }>
                            <div id="product_name">${product.name}</div>
                            <div class="bestseller__item__price">${product.price
              } ₺</div>
                        </div>
                        <div class="add_to_basket ${product.id + "add"
              }" onmousedown=mouseDown(${product.id
              })>Add to basket</div>
                    </div >
                `);
          });
        },
      });
    }

    function onChangeHandler(event) {
      const selection = $("#sort_by").val();
      if (selection == "highest_first") {
        getProducts("highest_first");
      }
      if (selection == "lowest_first") {
        getProducts("lowest_first");
      }
    }

    $.ajax({
      url: `api/category.php?category_id=${id}`,
      type: "get",
      success: function (response) {
        if (response.code == 200) {
          const categoryName = response.data[0].name;
          $("#category-name").append(categoryName);
        } else {
          console.log(response.message);
        }
      },
    });

    getProducts("highest_first");
    $("#sort_by").change(onChangeHandler);
  });
</script>