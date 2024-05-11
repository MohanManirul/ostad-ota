function showLoader() {
    document.getElementById('loader').classList.remove('d-none')
}
function hideLoader() {
    document.getElementById('loader').classList.add('d-none')
}

function successToast(msg) {
    Toastify({
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        text: msg,
        className: "mb-5",
        style: {
            background: "green",
        }
    }).showToast();
}

function errorToast(msg) {
    Toastify({
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        text: msg,
        className: "mb-5",
        style: {
            background: "red",
        }
    }).showToast();
}
 

function unauthorized(code){
    if(code===401){
        localStorage.clear();
        sessionStorage.clear();
        window.location.href="/adminpanel"
    }
}

// function setToken(token){
//     localStorage.setItem("token",`Bearer ${token}`)
// }

// function getToken(){
//    return  localStorage.getItem("token")
// }


function HeaderToken(){
   let token=getToken();
   return  {
        headers: {
            Authorization:token
        }
    }
}

function HeaderTokenWithBlob(){
    let token=getToken();
    return  {
        responseType: 'blob',
        headers: {
            Authorization:token
        }
    }
}
