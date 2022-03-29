const userName = document.getElementById('nameEditUser')
const lastname1 = document.getElementById('lastname1EditUser')
const lastname2 = document.getElementById('lastname2EditUser')
const userEmail = document.getElementById('emailEditUser')
const phone = document.getElementById('phoneEditUser')
const userPass = document.getElementById('passEditUser')
const editUserForm = document.getElementById('editUserForm')
const nameError = document.getElementById('editUserNameError')
const lastname1Error = document.getElementById('editUserLastName1Error')
const lastname2Error = document.getElementById('editUserLastName2Error')
const userEmailError = document.getElementById('editUserUserEmailError')
const phoneError = document.getElementById('editUserPhoneError')
const userPassError = document.getElementById('editUserUserPassError')

editUserForm.addEventListener('submit', (e) =>{
    let messages = []
    //NOMBRE
    if(userName.value.length>20){
        messages.push('El nombre debe ser de 20 caracteres o menos')
        nameError.innerText = '*El nombre debe ser de 20 caracteres o menos'
    }
    else{
        nameError.innerText = ''
    }
    //APELLIDO PATERNO
    if(lastname1.value.length>20){
        messages.push('El apellido paterno debe ser de 20 caracteres o menos')
        lastname1Error.innerText = '*El apellido paterno debe ser de 20 caracteres o menos'
    }
    else{
        lastname1Error.innerText = ''
    }
    //APELLIDO MATERNO
    if(lastname2.value.length>20){
        messages.push('El apellido materno debe ser de 20 caracteres o menos')
        lastname2Error.innerText = '*El apellido materno debe ser de 20 caracteres o menos'
    }
    else{
        lastname2Error.innerText = ''
    }
    //TELÉFONO
    if(!phone.value.match(/^[0-9]+$/)){
        messages.push('El teléfono debe contener solo números')
        phoneError.innerText = '*El teléfono debe contener solo números'
    }
    else if(phone.value.length>15){
        messages.push('El teléfono debe ser de 15 dígitos o menos')
        phoneError.innerText = '*El teléfono debe ser de 15 dígitos o menos'
    }
    else{
        phoneError.innerText = ''
    }
    //CONTRASEÑA
    if(userPass.value.length<8){
        messages.push('La contraseña debe ser de al menos 8 caracteres')
        userPassError.innerText = '*La contraseña debe ser de al menos 8 caracteres'
    }
    else if(userPass.value.length>30){
        messages.push('La contraseña debe ser de 30 caracteres o menos')
        userPassError.innerText = '*La contraseña debe ser de 30 caracteres o menos'
    }
    else if(!userPass.value.match(/[0-9]/)){
        messages.push('La contraseña debe incluir al menos un número')
        userPassError.innerText = '*La contraseña debe incluir al menos un número'
    }
    else if(!userPass.value.match(/[A-Z]/)){
        messages.push('La contraseña debe incluir al menos una mayúscula')
        userPassError.innerText = '*La contraseña debe incluir al menos una mayúscula'
    }
    else if(!userPass.value.match(/[¡\”\#\$\%\&\/\=\’\?\¡\¿\:\;\,\.\-\_\+\*\{\]\[\}]/)){
        messages.push('La contraseña debe incluir al menos un carácter especial')
        userPassError.innerText = '*La contraseña debe incluir al menos un carácter especial'
    }
    else{
        userPassError.innerText = ''
    }
    if(messages.length > 0){
    e.preventDefault()
    }
})