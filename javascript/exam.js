$(function () {
    $("#submit-button").hide();
    $("#submit-button").attr( "disabled", true);

    $("#checkbox-list").on("change", function() {
        let countChecked = $(".item-checkbox:checked").length;
        if (countChecked > 0) {
            $("#submit-button").attr( "disabled", false); // att
        } else {
            $("#submit-button").attr( "disabled", true);
        }

    });

    $("#category-list").on("change", function () {
        let selectedCategoryId = $("#category-list").val();
        let selectedUserId = $("#user-list").val();
        $("#checkbox-list").empty();

        get_all_items_without_this_cat(selectedCategoryId, selectedUserId);
    });

    $("#submit-button").on("click", function () {
        let selectedItems = [];
        let selectedCategoryId = $("#category-list").val();
        let selectedUserId = $("#user-list").val();
        $(".item-checkbox:checked").each(function() {
            selectedItems.push($(this).val());
        });


        fetch('items/add_multi_items_to_cat_service', {
            method: 'POST',
            headers: {
                "Content-type": "application/json"
            },
            body: JSON.stringify({
                categoryId: selectedCategoryId,
                itemsIds: selectedItems
            })
        }).then(response => response.json())
        .then(data => {
            $("#checkbox-list").empty();
            get_all_items_without_this_cat(selectedCategoryId, selectedUserId);
        }).catch(error => console.error("Erreur fetch :", error));
        });
});

function get_all_items_without_this_cat(selectedCategoryId, selectedUserId) {

    fetch('items/get_items_no_cat_service', {
        method: 'POST',
        headers: {
            "Content-type": "application/json"
        },
        body: JSON.stringify({
            categoryId: selectedCategoryId,
            userId: selectedUserId
        })
    }).then(response => response.json())
    .then(data => {
        const items = data.items ?? [];
        if (items.length > 0) {
            let userPseudo = $("#user-list option:selected").text(); // attention option
            let catName = $("#category-list option:selected").text();
            $("#title-position").append(generateTitle(userPseudo, catName));
            $("#submit-button").show();
            data.items.forEach(function(item) {
                $("#checkbox-list").append(generateRow(item.title, item.count_cat, item.id));
            });
        } else {
            $("#title-position").empty();
            $("#checkbox-list").append("<p>No items without this category.</p>")
            $("#submit-button").hide();
        }
        }).catch(error => console.error("Erreur fetch :", error));

}

function generateRow(name, count, id) {
    let isDisable = (count > 3)
    let checkable = isDisable ? "disabled" : ""
    let sentence = isDisable ? "(3 categories)" : ""
    return `
        <div>
            <input class="item-checkbox" type="checkbox" value="${id}"${checkable}>
            ${name}
            ${sentence}
        </div>
    `
}

function generateTitle(userPseudo, categoryName) {
    $("#title-position").empty();
    return `<h6>"Items from ${userPseudo} without category: ${categoryName}"</h6>`
}