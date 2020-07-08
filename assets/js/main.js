$('#register-show').click(function(){
    $(this).slideUp('fast');
    $('.register-wrap').slideDown('slow');
    $('.register-wrap').css("display", "flex");
});

function validate() {
    let firstName = $('#first-name').val();
    let lastName = $('#last-name').val();
    let user = $('#username-reg').val();
    let pw = $('#password-reg').val();
    let email = $('#email').val();

    let regexName = /^[A-Z]\w{1,20}(\s[A-Z]\w{1,20})*$/;
    let regexUser = /^\w+[\d\w]*$/;
    let regexEmail = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

    let errs = [];
    let mark = true;

    if(!regexName.test(firstName)) {
        errs.push("Bad name format");
        $('.err-f-name').css('visibility', 'visible');
        mark = false;
    }
    else {
        $('.err-f-name').css('visibility', 'hidden');
    }
    if(!regexName.test(lastName)) {
        errs.push("Bad name format");
        $('.err-l-name').css('visibility', 'visible');
        mark = false;
    }
    else {
        $('.err-l-name').css('visibility', 'hidden');
    }
    if(!regexUser.test(user)) {
        errs.push("Bad username format");
        $('.err-username').css('visibility', 'visible');
        mark = false;
    }
    else {
        $('.err-username').css('visibility', 'hidden');
    }
    if(pw.length < 5 || pw.length > 24) {
        errs.push("Bad password format");
        $('.err-pw').css('visibility', 'visible');
        mark = false;
    }
    else {
        $('.err-pw').css('visibility', 'hidden');
    }
    if(!regexEmail.test(email)) {
        errs.push("Bad email format");
        $('.err-email').css('visibility', 'visible');
        mark = false;
    }
    else {
        $('.err-email').css('visibility', 'hidden');
    }
    if(!mark) {
        return false;
    }
    else {
        $('.contactForm').submit();
    }
}

function validateContact() {
    let mark = true;
    let regexEmail = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    let email =$('#emailz');

    if(!regexEmail.test(email)) {
        $("emailz").css("border-color", "red");
        mark = false;
    }
    else {
        $("email").css("border-color", "#be9e21");
    }

    if(mark) {
        $('.contactForm').submit();
        alert("Success!");
    }

}

$("body").on("click", ".post-pag", function(){
    event.preventDefault();
    let limit = $(this).data("limit");
    $.ajax({
        url: "models/products/pagination.php", 
        method: "GET",
        dataType: "json",
        data: {
            limit: limit
        },
        success: function(data){
            displayProducts(data.items);
            displayPag(data.num_of_pages);
            console.log(data.num_of_pages);
        },
        error: function(error){ 
            console.error(error);
        }
    });
});

$('#search').keyup(function(){
    let value = $(this).val();

        $.ajax({
            url: "models/products/search.php",
            method: "get",
            data: {
                value : value
            },
            dataType: "json",
            success: function(data) {
                displayProducts(data);
                console.log(data);
            }
        })
})

$("body").on("change", ".sort", function(){
    let value = $(this).val();
    
    $.ajax({
        url: "models/products/sort-products.php",
        method: "post",
        data: {
            val : value
        },
        dataType: "json",
        success: function(data) {
            displayProducts(data);
            displayPag(data.num_of_pages);
        }
    })
});

$("body").on("change", ".filter", function(){
    let value = $(this).val();
    
    $.ajax({
        url: "models/products/filter-category.php",
        method: "post",
        data: {
            id : value
        },
        dataType: "json",
        success: function(data) {
            console.warn(data);
            displayProducts(data);
        }
    })
});

function displayPag(pages) {
    let ispis = "";
    for(let i = 0; i < pages; i++) { 
        ispis += `<li><a href="#" class="post-pag" data-limit="${i}">${i+1}</a></li>`;
    }

    $('#blog_pag').html(ispis);
}

function displayProducts(products) {
    let ispis = "";
    for(let p of products) {
        ispis += `
            <div class="col-lg-4 col-sm-12">
                <div class="blog-img">
                    <a href="index.php?page=product&id=${p.id}">
                        <img src="assets/img/items/${p.img}" class="img-responsive">
                    </a>
                    <h2>${p.name}</h2>
                    <h2 class="price">${p.price} &euro;</h2>
                </div>
            </div>
        `;
    }
    $('.product-frame').html(ispis);
}

$("body").on("click", '.user-delete', function(){
    event.preventDefault();
    let idUser = $(this).data('id');
    let row = $(this).parent().parent();

    $.ajax({
        url: "models/users/delete-user.php",
        method: "GET",
        data: {
            idUser: idUser
        },
        dataType: "json",
        success: function() {
            row.remove();
        },
        error: function(xhr) {
            console.warn(xhr);
        }
    });
});

$("body").on("click", '.product-delete', function(){
    event.preventDefault();
    let idProduct = $(this).data('id');
    let row = $(this).parent().parent();

    $.ajax({
        url: "models/products/delete-product.php",
        method: "GET",
        data: {
            idProduct: idProduct
        },
        dataType: "json",
        success: function(data) {
            row.remove();
        },
        error: function(xhr) {
            console.warn(xhr);
        }
    });
});

$("body").on("click", '.menu-delete', function(){
    event.preventDefault();
    let idMenu = $(this).data('id');
    let row = $(this).parent().parent();

    $.ajax({
        url: "models/menu/menu-delete.php",
        method: "GET",
        data: {
            id: idMenu
        },
        dataType: "json",
        success: function() {
            row.remove();
        },
        error: function(xhr) {
            console.warn(xhr);
        }
    });
});

$("body").on("click", '.cart-btn', function() {
    let id = $(this).val();

    $.ajax({
        url: "models/products/cart.php",
        method: "POST",
        data: {
            item_id : id
        },
        success: function(data) {
            console.log('kosovo je srbija');
        }
    })
});