function fetchPosts() {
    if (lastFetchedPostId === 0) // Se nessun post è presente, ritorna null
        return null;

    console.log(BASE_URL + 'home/feed/');           //      http://localhost/hw2/public/home/feed/
    fetch(BASE_URL+"home/feed/"+(lastFetchedPostId || ""))  //route feed, feed controller
    .then(fetchResponse)
    .then(fetchPostsJson);
}

function fetchResponse(response) {
    if (!response.ok) {
        return null;
    };
    return response.json();
}

function fetchPostsJson(json) {     //qui sto scorrendo i posts della home
    console.log("fetchPostsJson ");
    console.log(json);
    const feed = document.getElementById('feed');
    
    for (let i in json) {
        const post = document.getElementById('post_template').content.cloneNode(true).querySelector(".post");
        post.dataset.id = post.querySelector("input[type=hidden]").value = json[i].postid;  
        
        const name = post.querySelector(".name");
        name.textContent = json[i].name + " " + json[i].surname;
        
        post.querySelector(".username").textContent = "@" + json[i].username;
        post.querySelector(".time").textContent = json[i].time;
        
        post.classList.add(json[i].content.type);   //text
        post.querySelector(".text").textContent = json[i].content.text;
       
        // Carico i like
        const like = post.querySelector(".like");
        updateLikes(
                    {
                        'postid':json[i].postid,
                        'liked': json[i].liked, 
                        'nlikes': json[i].nlikes
                                                }, like);   

        const comment = post.querySelector(".comment");//button comment
        const ncomments = comment.querySelector("span");
        ncomments.textContent = json[i].ncomments;
       
        comment.addEventListener('click', commentPost);
        post.querySelector("form").addEventListener('submit', sendNewComment);

        feed.appendChild(post);
    }
    
    if (json.length < 10) {
        lastFetchedPostId =  0;
        
    } else {
        // Prendo l'ultimo elemento del JSON
        lastFetchedPostId = json.pop().postid;
    }
    console.log("lastfetch->"+lastFetchedPostId);
}

let lastFetchedPostId = null;
fetchPosts();//////////////////////////////////////////////////////////////////////////////////////


/**************************************************************************************************/
/* POST LIKES */
function likePost(event) {
    button = event.currentTarget;
    const formData = new FormData();//x memorizzare nel db
    
    formData.append('id', button.parentNode.parentNode.dataset.id); //salvo l'id del post
    formData.append('_token', CSRF_TOKEN);

    for (var pair of formData.entries())
    {
        console.log(pair[0]+ ', '+ pair[1]); 
    }

    fetch(BASE_URL + 'home/addLike', {method: 'post', body: formData})
    .then(fetchResponse)
    .then(function (json){ 
                    return updateLikes(json, button); 
                        
                    }
        );

    button.removeEventListener('click', likePost);
    button.addEventListener('click', unlikePost);
}




function unlikePost(event) {
    
    button = event.currentTarget;

    const formData = new FormData();
    formData.append('id', button.parentNode.parentNode.dataset.id);//prendo l id del post
    formData.append('_token', CSRF_TOKEN);

    console.log('unlike post');

    fetch(BASE_URL + 'home/removeLike', {method: 'post', body: formData}).then(fetchResponse)
    .then(function (json){ 
                        return updateLikes(json, button); 
                        
                        }
        );
    
    button.removeEventListener('click', unlikePost);
    button.addEventListener('click', likePost);
}

function commentPost(event) {
    
    const post =  event.currentTarget.parentNode.parentNode;
    const comments = post.querySelector(".comments");

    if (comments.clientHeight == 0) {

        console.log('show comments post con id = ' + post.dataset.id );
        console.log(BASE_URL +'home/showComments/' + post.dataset.id);

        fetch(BASE_URL + 'home/showComments'+"/"+post.dataset.id).then(fetchResponse)
        .then(function (json){ 
            return updateComments(json, comments); 
        });
    } else {
        comments.style.height = 0;//setto l' altezza
    }

    
}

function sendNewComment(event) {
    
    const cont = event.currentTarget.parentNode.parentNode;
    const formData = new FormData(event.currentTarget);
    formData.append('_token', CSRF_TOKEN);

    fetch( BASE_URL + 'home/addComment', {method: 'post', body: formData}).then(fetchResponse)
    .then(function (json){ 
        return updateComments(json, cont); 
    });
    const t = event.currentTarget.querySelector('input[type=text]');
    t.blur();
    t.value = "";
    event.preventDefault();
}

function updateLikes(json, button) {    //funz chiamata sia nella fetch likes che dentro fetchpostjson
    console.log(json);

    button.setAttribute('class', json.liked ? 'liked' : 'like');//setto la classe al button like o liked

    if (json.liked == false) {
        button.addEventListener('click', likePost);
    } else {
        button.classList.remove('like');
        button.classList.add('liked');
        button.addEventListener('click', unlikePost);
    }

    button.querySelector('span').textContent = json.nlikes;
    console.log("nlike = " + json.nlikes);
    
    if (json.nlikes) 
        button.querySelector('span').addEventListener('click', likeView);
    else 
        button.querySelector('span').removeEventListener('click', likeView);

}

function updateComments(json, section) {
    console.log(json);

    const ncomments = document.querySelector(".comment span");
    ncomments.textContent = json.length;//setto il nuovo numero di comments

    const container = section.querySelector(".past_messages");
    container.innerHTML = '';
    let i;
    // Scorro l'array dal commento più recente al più vecchio
    for (i = Object.keys(json).length-1; i >= 0; i--) {
        // Creo gli oggetti che contengono i commenti
        const message = document.createElement('div');
        message.classList.add('commento');
        const userinfo = document.createElement('div');
        userinfo.classList.add('userinfo');
        message.appendChild(userinfo);
        const username = document.createElement('a');
        username.classList.add('username');
        username.textContent = "@"+json[i].username;
        userinfo.appendChild(username);
        const time = document.createElement('div');
        time.classList.add('time');
        time.textContent = json[i].time;
        userinfo.appendChild(time);
        const text = document.createElement('div');
        text.classList.add('text');
        text.textContent = json[i].text;
        message.appendChild(text);
        container.appendChild(message);
    } 
    container.scrollTop = container.scrollHeight;
    section.style.height = section.scrollHeight;//setto l' altezza
}


//********  modale per persone a cui piace

function likeView(event) {
    const button = event.currentTarget;

    const postid = button.parentNode.parentNode.parentNode.dataset.id;

    fetch(BASE_URL + 'home/likeView/' + postid).then(fetchResponse).then(displayModalUsers);
    
    document.querySelector('#modal .modal_desc').textContent = "Persone a cui piace";

    console.log('Vedi Likes');
    event.stopPropagation();
}

function displayModalUsers(json) {
    if (!json.length) 
        return;

    const modal = document.getElementById('modal');
    const place = document.getElementById('modal_place');
    place.innerHTML = '';

    for (i in json) {
        // Mostro tutti gli utenti che hanno messo like
        const userinfo = document.createElement('div');
        userinfo.classList.add('userinfo');
        const names = document.createElement('a');
        names.classList.add('names');
        userinfo.appendChild(names);
        const name = document.createElement('div');
        name.classList.add('name');
        name.textContent = json[i].name + " " + json[i].surname;
        names.appendChild(name);
        const username = document.createElement('div');
        username.classList.add('username');
        username.textContent = "@"+json[i].username;
        names.appendChild(username);

        place.appendChild(userinfo);
    }

    modal.classList.remove('hidden');
}
function closeModal(event) {
    const modal = document.getElementById('modal');
    modal.classList.add('hidden');
}

function customStopPropagation(event) {
    event.stopPropagation();
}

document.getElementById('modal_close').addEventListener('click', closeModal);
document.querySelector('#modal .window').addEventListener('click', customStopPropagation);
document.getElementById('modal').addEventListener('click', closeModal);

