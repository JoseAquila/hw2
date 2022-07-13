function loadCatGif(event){
    //fetch("https://api.thecatapi.com/v1/images/search").then(searchResponse).then(searchJson);
    fetch(BASE_URL +'cat').then(searchResponse).then(searchJson);

    event.preventDefault();
}

function searchResponse(response){
    if(!response.ok) {
        return null;
    }
    
    return response.json();
}

function searchJson(json){
    console.log(json);
    if (!json.length){ 
        return; 
    }
    
    jsonCat(json);
    
}

function jsonCat(json) {
    const container = document.getElementById('apiBox');
    container.className = 'cat';

    const catimg = document.createElement('img');
    catimg.classList.add('cat');
    catimg.dataset.id = json[0].id;
    catimg.src = json[0].url;
    container.appendChild(catimg);
}


const api = document.getElementById('clicca');
api.addEventListener('click', loadCatGif);