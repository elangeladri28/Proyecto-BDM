/*const imageInputs = document.getElementById('imageFiles');
var inputTags = imageInputs.getElementsByTagName('input');
var inputsList = imageInputs.getElementsById('crearNoticiaImg');
var totalInputs = inputTags.length*/

function addImgInput(){
    const imageInputs = document.getElementById('imageFiles');
    var inputTags = imageInputs.getElementsByTagName('input');
    for(let item of inputTags){
        console.log(item.value);
        if(item.value == '' && !item.required){
            item.remove();
        }
    }
    //console.log(inputTags);
    var newField = document.createElement('input');
    newField.setAttribute('type','file');
    newField.setAttribute('class','form-control-file');
    newField.setAttribute('id','crearNoticiaImg');
    newField.setAttribute('name','crearNoticiaImg[]');
    newField.setAttribute('accept','.jpg,.jpeg,.png');
    newField.setAttribute('oninput','addImgInput()');
    imageInputs.appendChild(newField);
    console.log(imageInputs.lastChild.value);
}

function addVidInput(){
    const videoInputs = document.getElementById('videoFiles');
    var inputTags = videoInputs.getElementsByTagName('input');
    for(let item of inputTags){
        console.log(item.value);
        if(item.value == '' && !item.required){
            item.remove();
        }
    }
    //console.log(inputTags);
    var newField = document.createElement('input');
    newField.setAttribute('type','file');
    newField.setAttribute('class','form-control-file');
    newField.setAttribute('id','crearNoticiaVid');
    newField.setAttribute('name','crearNoticiaVid[]');
    newField.setAttribute('accept','.mp4,.wmv');
    newField.setAttribute('oninput','addVidInput()');
    videoInputs.appendChild(newField);
    console.log(videoInputs.lastChild.value);
}