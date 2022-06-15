const addFieldBtn = document.querySelector('.addFieldBtn');
const deleteFieldBtn = document.querySelector('.deleteFieldBtn');
const coursesDivWrapper = document.querySelector('.cursos');

//Variable inputCounter, necesaria para diferenciar un input de otro.
//inputCounter variable, needed to differentiate one input to another
var inputCounter = 1;
//HTML elements
var textInput, rowDiv, inputDiv, btnDiv, btnDeleteField, btnAccept, btnNotAccept,iconDelete,iconAccept,iconNotAccept; 

var acceptBtn0 = document.querySelector('#accept0');
var notAcceptBtn0 = document.querySelector('#notAccept0'); 
var courseInput0 = document.querySelector('#curso0');

addFieldBtn.addEventListener('click', () => {
    createHtmlElements();
    setInputType();
    //setValues();
    setAttributes();
    setClassNames();
    configureBtnAccept();
    configureBtnNotAccept();
    configureBtnDelete();
    //Juntando/anexando elementos en uno solo elemento HTML
    appendChilds();
    inputCounter++;
})

function createHtmlElements(){
    textInput = document.createElement('input');
    rowDiv = document.createElement('div');
    inputDiv = document.createElement('div'); 
    btnDiv = document.createElement('div');
    btnAccept = document.createElement('button');
    btnNotAccept = document.createElement('button');
    btnDeleteField = document.createElement('button');
    iconDelete = document.createElement('i');
    iconAccept = document.createElement('i');
    iconNotAccept = document.createElement('i');
}

function setInputType(){
    textInput.type = 'text';
}

function setValues(){
    //Para campos no editables quitar comentarios de linea
    //textInput.value = document.querySelector('.cursoSugeridoText').value;
}

function setAttributes(){
    //Para campos no editablesquitar comentarios de linea
    //textInput.setAttribute('readonly','');
    textInput.setAttribute('name','cursos['+inputCounter+']');
    textInput.setAttribute('id','curso'+inputCounter);
    textInput.setAttribute('required', '');
}

function setClassNames(){
    //Setting the inputCounter into the className of the input, so that is unique from each other.
    //Asignando el inputCounter al className del input, para que sea unico uno del otro. 
    rowDiv.className= 'row mb-3 cursoSugerido'+inputCounter;
    textInput.className = "form-control"
    inputDiv.className = 'col-lg-10 col-md-9 col-sm-8';
    btnDiv.className = 'col-lg-2 col-md-3 col-sm-4';

    btnAccept.className = 'btn btn-outline-success btn-sm me-1';
    btnNotAccept.className = 'btn btn-outline-primary btn-sm me-1';
    btnDeleteField.className = 'btn btn-outline-danger btn-sm';

    
    iconDelete.className = 'bi bi-trash3-fill';
    iconAccept.className = 'bi bi-check';
    iconNotAccept.className = 'bi bi-x';
}

//This function configures the delete button
//Esta funcion configura el boton de eliminar un campo/input
function configureBtnDelete(){
    //var symbol = document.createTextNode('Quitar');
    //Set de current inputCounter to the button, for reference when deleting input
    //Asignar el id con el inputCounter actual, este servirá de apuntador al eleminar el campo seleccionado
    btnDeleteField.id = inputCounter;
    btnDeleteField.type = 'button';
    btnDeleteField.appendChild(iconDelete);

    //Asignando funcion onClick
    btnDeleteField.onclick = function(){
        //Getting the selected button id, to reference input to delete.
        //Obteniendo el id del boton seleccionado, para hacer referencia al input a eliminar
        var id = this.id;
        document.querySelector('.cursoSugerido'+id).remove();
    };
}

//Esta funcion configura el boton de aceptar el curso seleccionado.
//Cambia el estado del boton (deshabilitado a disponible y viceversa)
function configureBtnAccept(){
    //Definir el id y value del boton aceptar, esto servirá como apuntador o identificador.
    btnAccept.id = "accept"+inputCounter;
    btnAccept.value = inputCounter;

    btnAccept.type = 'button';
    btnAccept.appendChild(iconAccept);

    //Asignando funcion onClick, para cada boton creado
    btnAccept.onclick = function(){
        //Este valor será usado para referenciar los id de los botones correspondientes
        var id = this.value;

        console.log(id);

        var accept = document.querySelector('#accept' + id);
        var notAccept = document.querySelector('#notAccept' + id);
        var courseInput = document.querySelector('#curso'+id);
        //Si el boton -aceptar- no ha sido seleccionado:
        if(accept.classList.contains('btn-outline-success')){
            //Marcalo como seleccionado y deshabilita el boton de -no aceptar-
            accept.classList.replace('btn-outline-success','btn-success');
            notAccept.disabled = true;
            courseInput.setAttribute('readonly', '');
        }else{
            //Viceversa (si está seleccionado, marcalo no seleccionado y habilita el boton de -no aceptar-)
            accept.classList.replace('btn-success','btn-outline-success');
            notAccept.disabled = false;
            courseInput.removeAttribute('readonly', '');
        }

    };
}

//Esta funcion configura el boton de no aceptar el curso seleccionado
//Cambia el estado del boton (deshabilitado a disponible y viceversa)
function configureBtnNotAccept(){
     //Definir el id y value del boton aceptar, esto servirá como apuntador o identificador.
    btnNotAccept.id = "notAccept"+inputCounter;
    btnNotAccept.value = inputCounter;

    btnNotAccept.type = 'button';
    btnNotAccept.appendChild(iconNotAccept);

    //Asignando funcion onClick, para cada boton creado
    btnNotAccept.onclick = function(){
         //Este valor será usado para referenciar los id de los botones correspondientes
        var id = this.value;

        var accept = document.querySelector('#accept' + id);
        var notAccept = document.querySelector('#notAccept' + id);
        var courseInput = document.querySelector('#curso'+id);
        //Si el boton -no aceptar- no ha sido seleccionado:
        if(notAccept.classList.contains('btn-outline-primary')){
            //Marcalo como seleccionado y deshabilitar el boton de -aceptar-
            notAccept.classList.replace('btn-outline-primary','btn-primary');
            accept.disabled = true;
            courseInput.setAttribute('readonly', '');
        }else{
            //Viceversa (si está seleccionado, marcalo no seleccionado y habilita el boton de -aceptar-)
            notAccept.classList.replace('btn-primary','btn-outline-primary');
            accept.disabled = false;
            courseInput.removeAttribute('readonly', '');
        }
    };
}

//Misma funcion anterior, pero esta es para el primer campo que siempre del documento
function accept(){
    //Si el boton -aceptar- no ha sido seleccionado:
    if(acceptBtn0.classList.contains('btn-outline-success')){
        //Marcalo como seleccionado y deshabilita el boton de -no aceptar-
        acceptBtn0.classList.replace('btn-outline-success','btn-success');
        notAcceptBtn0.disabled = true;
        courseInput0.setAttribute('readonly', '');
    }else{
        //Viceversa (si está seleccionado, marcalo no seleccionado y habilita el boton de -no aceptar-)
        acceptBtn0.classList.replace('btn-success','btn-outline-success');
        notAcceptBtn0.disabled = false;
        courseInput0.removeAttribute('readonly', '');
    }
}

function notAccept(){

    if(notAcceptBtn0.classList.contains('btn-outline-primary')){
        //Marcalo como seleccionado y deshabilitar el boton de -aceptar-
        notAcceptBtn0.classList.replace('btn-outline-primary','btn-primary');
        acceptBtn0.disabled = true;
        courseInput0.setAttribute('readonly', '');
    }else{
        //Viceversa (si está seleccionado, marcalo no seleccionado y habilita el boton de -aceptar-)
        notAcceptBtn0.classList.replace('btn-primary','btn-outline-primary');
        acceptBtn0.disabled = false;
        courseInput0.removeAttribute('readonly', '');
    }

}


//Asignando elementos del documento
function appendChilds(){
    inputDiv.appendChild(textInput);

    btnDiv.appendChild(btnAccept);
    btnDiv.appendChild(btnNotAccept);
    btnDiv.appendChild(btnDeleteField);

    rowDiv.appendChild(inputDiv);
    rowDiv.appendChild(btnDiv);
    //Asignandolo al div ya existente dentro del HTML (rowDiv -> coursesDivWrapper)
    coursesDivWrapper.appendChild(rowDiv);
}

var selectCargo = document.querySelector("#cargo");
var seccion2 = document.querySelector("#seccion2");
function mostrar(){

    if(selectCargo.value != 0){
        
        seccion2.style.opacity = "1"
    }
    
}