function createNewPost(event){
    const formData = new FormData(document.querySelector("form.invia_post"));
    formData.append('type', contentObj.type);//type sara' text
    
    for (var pair of formData.entries())
    {
        console.log(pair[0]+ ', '+ pair[1]); 
    }

    fetch(BASE_URL + 'create_post_view/create_post', {method: 'post', body: formData}).then(dispatchResponse, dispatchError);
    
    event.preventDefault();
}

function dispatchResponse(response) {

    if(!response.ok) {
        dispatchError();
        return null;
    }
    
    return response.json().then(databaseResponse);
}

function dispatchError(){ 
    const form = document.querySelector('form.scelta');
    form.classList.add('hidden');
    const div = document.querySelector('div#pensiero');
    div.classList.add('hidden');

    const resultfail = document.getElementById('dispatch_result_fail');
    resultfail.classList.remove('hidden');
    const resultok = document.getElementById('dispatch_result_success');
    resultok.classList.add('hidden');
}

function customStopPropagation(event) {
    event.stopPropagation();
}

function databaseResponse(json) {
    if (!json.ok) {
        dispatchError();
        return null;
    }
    console.log(json);
    const result = document.getElementById('dispatch_result_success');
    result.classList.remove('hidden');
    const resultfail = document.getElementById('dispatch_result_fail');
    resultfail.classList.add('hidden');
    const form = document.querySelector(' div .hidden_for_post');
    form.classList.add('hidden');
}

document.querySelector('#newpost').addEventListener('click', customStopPropagation);
document.querySelector("form.invia_post").addEventListener("submit", createNewPost);


//scelta, per il momento solo post con testo

function selectText(event) {//qui visualizzo il form per publicare il post
    contentObj = {};
    contentObj.type = 'text';

    const container = document.querySelector('#container');
    const text = document.querySelector('#newpost div#pensiero');
    const button = document.querySelector('button#think');
    container.classList.add('plus');
    button.classList.add('btn_hidden');
    text.classList.remove('hidden');

    event.preventDefault();
}
let contentObj = {};
document.querySelector("#think").addEventListener("click", selectText);//bottone (scrivi post)



function entraSubitoQui(){
    const resultok = document.getElementById('dispatch_result_success');
    resultok.classList.add('hidden');
    const resultfail = document.getElementById('dispatch_result_fail');
    resultfail.classList.add('hidden');
}

entraSubitoQui();

