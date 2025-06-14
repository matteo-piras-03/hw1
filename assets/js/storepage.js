var active_session;
const form = document.forms['item_values'];
var item_category;
var item_title; 
for (let element of form.elements){
    if(element.name === "category"){
        item_category = element.value;
    }
    else if(element.name === "title"){
        item_title = element.value;
    }
}

function onCheckResponse(response){
    return response.json();
}

function onCheckJson(json){
    active_session = json.session_active;
}

const item_list = document.querySelector("#item-list");
if(item_category && !item_title)
    fetch("../php/get_storepage_items.php?category=" + encodeURIComponent(item_category)).then(onResponse).then(onJson);
else if(!item_category && item_title)
    fetch("../php/get_storepage_items.php?title=" + encodeURIComponent(item_title)).then(onResponse).then(onJson);
else if(item_category && item_title)
    fetch("../php/get_storepage_items.php?category=" + encodeURIComponent(item_category) +"&title=" + encodeURIComponent(item_title)).then(onResponse).then(onJson);

function onResponse(response){
    return response.json();
}

function onImgMouseover(event){
    event.stopPropagation();
    const nodeList = event.currentTarget.childNodes;
    for(node of nodeList){
        if(node.tagName === "DIV"){
            node.classList.remove("hidden");
        }
    }
}

function onImgMouseout(event){
    event.stopPropagation();
    const nodeList = event.currentTarget.childNodes;
    for(const node of nodeList){
        if(node.tagName === "DIV"){
            node.classList.add("hidden");
        }
    }
}

var save_item_response;
var delete_item_response;

async function onSaveButtonClick(event){
    event.stopPropagation();
    const save_button = event.currentTarget;
    const id = save_button.parentNode.parentNode.dataset.id;
    const formdata = new FormData();
    formdata.append("item_id", id);
    if(save_button.dataset.fullstate === "false"){
        //salvataggio dell'oggetto
        await fetch("../php/add_saved_item.php", {method: "post", body: formdata}).then(onFetchResponse).then(onSavedItemText);
        if(save_item_response >= 0)
            save_button.dataset.fullstate = "true";    
    }else{
        //cancellazzione dell'oggetto salvato
        await fetch("../php/delete_saved_item.php", {method: "post", body: formdata}).then(onFetchResponse).then(onDeleteSavedItemText);
        if(delete_item_response === "1")
            save_button.dataset.fullstate = "false";
    }
}

function onSavedItemText(text){
    save_item_response = text;
}

function onDeleteSavedItemText(text){
    delete_item_response = text;
}

var add_item_cart_response;

async function onBuyButtonClick(event){
    event.stopPropagation();
    if(active_session){
        const id = event.currentTarget.parentNode.parentNode.dataset.id;
        const cart_button = event.currentTarget;
        const desc = event.currentTarget.parentNode;
        const formdata = new FormData();
        formdata.append("item_id", id);
        await fetch("../php/add_item_cart.php", {method: "post", body: formdata}).then(onFetchResponse).then(onCartText);
        const msg = document.createElement("span");
        switch(add_item_cart_response){
            case "-1": //errore fatale
                msg.classList.add("cart-error");
                msg.textContent = "Errore.";
                desc.appendChild(msg);
                break;
            case "0": //oggetto già presente nel carrello
                msg.classList.add("cart-error");
                msg.textContent = "Oggetto già presente nel carrello.";
                desc.appendChild(msg);
                break;
            case "1": //oggetto inserito correttamente nel carrello
                msg.classList.add("cart-added");
                msg.textContent = "Oggetto inserito nel carrello.";
                desc.appendChild(msg);
                break;
        }
        cart_button.classList.add("hidden");
        cart_button.removeEventListener("click",onBuyButtonClick);
    }else{
        window.location.href = "login.php";
    }
}

function onFetchResponse(response){
    if(response.ok)
        return response.text();
}

function onCartText(text){
    add_item_cart_response = text;
}

var saved_items_list = [];

async function onJson(json){
    console.log(json);
    await fetch("../php/check_session.php").then(onCheckResponse).then(onCheckJson);
    if(active_session)
        await fetch("../php/get_saved_items.php").then(onFetchSavedItemsReponse).then(onFetchSavedItemsJson); //controllo degli oggetti salvati per il tasto salva oggetti
    for(const item of json){
        const item_id = item.id;
        const item_title = item.title;
        const item_price = item.price;
        const item_shipping = item.shipping;
        const item_img = item.src;

        const div = document.createElement("div");
        div.classList.add("item");
        const img_container = document.createElement("div");
        img_container.classList.add("img-container");

        const desc = document.createElement("div");
        desc.classList.add("desc");
        const img = document.createElement("img");
        img.src = item_img;
        const title = document.createElement("span");
        title.classList.add("title");
        title.textContent = item_title;
        const price = document.createElement("span");
        price.classList.add("price");
        price.textContent = item_price + " €";
        const shipping = document.createElement("span");
        shipping.classList.add("shipping");
        if(item_shipping === "0.00"){
            shipping.textContent = "Spedizione gratuita";
        }
        else{
            shipping.textContent = item_shipping + " €" + " di spedizione";
        }
        const br = document.createElement("br");
        
        img_container.appendChild(img);
        if(active_session){
            const save_button = document.createElement("div");
            save_button.classList.add("save-button");
            save_button.classList.add("hidden");
            if(saved_items_list.includes(item_id))
                save_button.dataset.fullstate = "true";
            else
                save_button.dataset.fullstate = "false";
            save_button.addEventListener("click", onSaveButtonClick);
            img_container.appendChild(save_button);
            img_container.addEventListener("mouseover", onImgMouseover, {capture: true});
            img_container.addEventListener("mouseout", onImgMouseout, {capture: true});
        }
        const buy_button = document.createElement("button");
        buy_button.classList.add("buy-button");
        buy_button.textContent = "Aggiungi al carrello";
        buy_button.addEventListener("click", onBuyButtonClick);
        div.appendChild(img_container);
        desc.appendChild(title);
        desc.appendChild(price);
        desc.appendChild(br);
        desc.appendChild(shipping);
        desc.appendChild(buy_button);
        div.dataset.id = item_id;
        div.appendChild(desc);
        div.addEventListener("click", onItemClick);
        item_list.appendChild(div);

    }
}

function onFetchSavedItemsReponse(response){
    if(response.ok)
        return response.json();
}

function onFetchSavedItemsJson(json){
    for(const item of json){
        saved_items_list.push(item.id);
    }
    console.log(saved_items_list);
}

function onItemClick(event){
    window.location.href = "item_page.php?id=" + encodeURIComponent(event.currentTarget.dataset.id);
}